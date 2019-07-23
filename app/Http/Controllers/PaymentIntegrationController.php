<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\OrderInformation;
use App\PaymentInformation;
use App\Support\PaymentGateway;
use App\TopAdPackage;
use Illuminate\Http\Request;
use Session;

class PaymentIntegrationController extends Controller
{
    public function index(Request $request){
        $userId = Session::get('frontUserId');
        $user = FrontUser::where('id',$userId)->first();
        $topPackage = TopAdPackage::where('id',$request->top_package_id)->first();

        $orderInfo = new OrderInformation();
        $orderInfo->customer_id = $userId;
        $orderInfo->customer_name = $user->name;
        $orderInfo->ad_id = $request->ad_id;
        $orderInfo->ad_info_id = $request->ad_info_id;
        $orderInfo->top_package_id = $request->top_package_id;
        $orderInfo->save();

//        $paymentGateway = new PaymentGateway('ghoreboshe_1624705955','ghoreboshe_1180191999','WMX5b4431a58a04b','fcd5307c91aa15f1cb02dab8ffb3a01dd8960228');
        $paymentGateway = new PaymentGateway('GhoreyBoshe_1462888135','GhoreyBoshe_1710652819','WMX5b0d23f49a65e','335112a7c9fd192f33ef6a1e7f9f488e6c67a728');

        $customer_info = array(
            "customer_name"     => $user->name,
            "customer_email"    => $user->email,
            "customer_add"      => "Nikunjo",
            "customer_phone"    => $user->phone_number,
        );
        $paymentGateway->set_shipping_charge(0);
        $paymentGateway->set_discount(0);

        $product = array(
            'name' => $topPackage->package_name,
            'price' => $topPackage->package_price,
            'quantity' => 1
        );
        $paymentGateway->set_product_description($product);

        $paymentGateway->set_merchant_order_id($orderInfo->id);

        $paymentGateway->set_app_name('ghoreyboshe.com');
        $paymentGateway->set_currency('BDT');
        $paymentGateway->set_callback_url('http://ghoreyboshe.com/merchant-callback');
//        $paymentGateway->set_callback_url('http://localhost/ghoreyboshe/public/merchant-callback');

        $paymentGateway->set_transaction_related_params($customer_info);

        $paymentGateway->set_database_driver('session'); // options: "txt" or "session"

        $paymentGateway->send_data_to_walletmix();
    }

    public function merchantCallback(){

//        $walletmix = new PaymentGateway('ghoreboshe_1624705955','ghoreboshe_1180191999','WMX5b4431a58a04b','fcd5307c91aa15f1cb02dab8ffb3a01dd8960228');

        $walletmix = new PaymentGateway('GhoreyBoshe_1462888135','GhoreyBoshe_1710652819','WMX5b0d23f49a65e','335112a7c9fd192f33ef6a1e7f9f488e6c67a728');
        $walletmix->set_database_driver('session');	// options: "txt" or "session"

        if(isset($_POST['merchant_txn_data'])){
            $merchant_txn_data = json_decode($_POST['merchant_txn_data']);

            $walletmix->get_database_driver();

            if($walletmix->get_database_driver() == 'txt'){
                $saved_data = json_decode($walletmix->read_file());
            }elseif($walletmix->get_database_driver() == 'session'){
                // Read data from your database
                $saved_data = json_decode($walletmix->read_data());
            }

            if($merchant_txn_data->token === $saved_data->token){

                $wmx_response = json_decode($walletmix->check_payment($saved_data));
//                $walletmix->debug($wmx_response,true);
                if(	($wmx_response->wmx_id == $saved_data->wmx_id) ){
                    if(	($wmx_response->txn_status == '1000') ){
                        if(	($wmx_response->bank_amount_bdt >= $saved_data->amount) ){
                            if(	($wmx_response->merchant_amount_bdt == $saved_data->amount) ){
                                $paymentInfo = new PaymentInformation();
                                $paymentInfo->wmx_id = $wmx_response->wmx_id;
                                $paymentInfo->ref_id = $wmx_response->ref_id;
                                $paymentInfo->token = $wmx_response->token;
                                $paymentInfo->merchant_req_amount = $wmx_response->merchant_req_amount;
                                $paymentInfo->merchant_ref_id = $wmx_response->merchant_ref_id;
                                $paymentInfo->merchant_currency = $wmx_response->merchant_currency;
                                $paymentInfo->merchant_amount_bdt = $wmx_response->merchant_amount_bdt;
                                $paymentInfo->conversion_rate = $wmx_response->conversion_rate;
                                $paymentInfo->service_ratio = $wmx_response->service_ratio;
                                $paymentInfo->wmx_charge_bdt = $wmx_response->wmx_charge_bdt;
                                $paymentInfo->emi_ratio = $wmx_response->emi_ratio;
                                $paymentInfo->emi_charge = $wmx_response->emi_charge;
                                $paymentInfo->bank_amount_bdt = $wmx_response->bank_amount_bdt;
                                $paymentInfo->discount_bdt = $wmx_response->discount_bdt;
                                $paymentInfo->merchant_order_id = $wmx_response->merchant_order_id;
                                $paymentInfo->request_ip = $wmx_response->request_ip;
                                $paymentInfo->txn_details = $wmx_response->txn_details;
                                $paymentInfo->card_details = $wmx_response->card_details;
                                $paymentInfo->is_foreign = $wmx_response->is_foreign;
                                $paymentInfo->payment_card = $wmx_response->payment_card;
                                $paymentInfo->card_code = $wmx_response->card_code;
                                $paymentInfo->payment_method = $wmx_response->payment_method;
                                $paymentInfo->init_time = $wmx_response->init_time;
                                $paymentInfo->txn_time = $wmx_response->txn_time;
                                $paymentInfo->save();

                                return redirect()->route('save-top-ad-information',['orderId'=>$paymentInfo->merchant_order_id]);
                            }else{
                                return redirect('/all-ad')->with('message','Merchant amount mismatch. Merchant Amount : '.$saved_data->amount.' Bank Amount : '.$wmx_response->bank_amount_bdt.'. Update merchant database with success');
                            }
                        }else{
                            return redirect('/all-ad')->with('message','Bank amount is less then merchant amount like partial payment.You can make it failed transaction.');
                        }
                    }else{
                        return redirect('/all-ad')->with('message','Update merchant database with failed');
                    }
                }else{
                    return redirect('/all-ad')->with('message','Merchant ID Mismatch');
                }
            }else{
                return redirect('/all-ad')->with('message','Token mismatch');
            }
        }else{
            return redirect('/all-ad')->with('message','Try to direct access');
        }
    }
}
