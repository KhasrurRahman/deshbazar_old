<?php

namespace App\Http\Controllers\Footer;

use App\footer;
use App\footer2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function jana_ojana(){
        $footer = footer::all()->first();

        return view('admin.footer.jana_ojana',compact('footer'));
    }
    public function jana_ojana_save(Request $request){
        $id = footer::all()->first()->id;
        $jana_ojana = footer::find($id);
        $jana_ojana ->jana_ojana = $request->description;
        $jana_ojana ->update();

        return redirect()->back();
    }

    public function ad_rules(){
        $footer = footer::all()->first();

        return view('admin.footer.ad_rules',compact('footer'));
    }
    public function ad_rules_save(Request $request){
        $id = footer::all()->first()->id;
        $ad_rules = footer::find($id);
        $ad_rules ->ad_rules = $request->description;
        $ad_rules ->update();

        return redirect()->back();
    }

    public function payment_information(){
        $footer = footer::all()->first();

        return view('admin.footer.payment_information',compact('footer'));
    }
    public function payment_information_save(Request $request){
        $id = footer::all()->first()->id;
        $payment_information = footer::find($id);
        $payment_information ->payment_information = $request->description;
        $payment_information ->update();

        return redirect()->back();
    }

    public function customer_deal(){
        $footer = footer::all()->first();

        return view('admin.footer.customer_deal',compact('footer'));
    }
    public function customer_deal_save(Request $request){
        $id = footer::all()->first()->id;
        $customer_deal = footer::find($id);
        $customer_deal ->customer_deal = $request->description;
        $customer_deal ->update();

        return redirect()->back();
    }

    public function fast_sell(){
        $footer = footer::all()->first();

        return view('admin.footer.fast_sell',compact('footer'));
    }
    public function fast_sell_save(Request $request){
        $id = footer::all()->first()->id;
        $fast_sell = footer::find($id);
        $fast_sell ->fast_sell = $request->description;
        $fast_sell ->update();

        return redirect()->back();
    }

    public function terms(){
        $footer = footer::all()->first();

        return view('admin.footer.terms_save',compact('footer'));
    }
    public function terms_save(Request $request){
        $id = footer::all()->first()->id;
        $terms = footer::find($id);
        $terms ->terms = $request->description;
        $terms ->update();

        return redirect()->back();
    }

    public function admin_delivery(){
        $footer = footer::all()->first();

        return view('admin.footer.delivery',compact('footer'));
    }
    public function admin_delivery_save(Request $request){
        $id = footer::all()->first()->id;
        $delivery = footer::find($id);
        $delivery ->delivery = $request->description;
        $delivery ->update();

        return redirect()->back();
    }

    public function admin_membership(){
        $footer = footer::all()->first();

        return view('admin.footer.membership',compact('footer'));
    }
    public function admin_membership_save(Request $request){
        $id = footer::all()->first()->id;
        $membership = footer::find($id);
        $membership ->membership = $request->description;
        $membership ->update();

        return redirect()->back();
    }

    public function admin_about_us(){
        $footer = footer::all()->first();

        return view('admin.footer.about_us',compact('footer'));
    }
    public function admin_about_us_save(Request $request){
        $id = footer::all()->first()->id;
        $membership = footer::find($id);
        $membership ->about_us = $request->description;
        $membership ->update();

        return redirect()->back();
    }

    public function business_demand(){
        $footer = footer::all()->first();

        return view('admin.footer.business_demand',compact('footer'));
    }
    public function business_demand_save(Request $request){
        $id = footer::all()->first()->id;
        $membership = footer::find($id);
        $membership ->business_demand = $request->description;
        $membership ->update();

        return redirect()->back();
    }

    public function secret_terms(){
        $footer = footer::all()->first();

        return view('admin.footer.secret_terms',compact('footer'));
    }
    public function secret_terms_save(Request $request){
        $id = footer::all()->first()->id;
        $membership = footer::find($id);
        $membership ->secret_terms = $request->description;
        $membership ->update();

        return redirect()->back();
    }

    public function ghoreyboshe_career(){
        $footer = footer2::all()->first();

        return view('admin.footer.ghoreyboshe_career',compact('footer'));
    }
    public function ghoreyboshe_career_save(Request $request){
        $id = footer::all()->first()->id;
        $membership = footer2::find($id);
        $membership ->ghoreyboshe_career = $request->description;
        $membership ->update();

        return redirect()->back();
    }


}
