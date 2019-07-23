<?php

namespace App\Http\Controllers;

use App\ProductCountry;
use App\ProductDistrict;
use App\ProductDivision;
use Illuminate\Http\Request;
use DB;

class ProductLocationController extends Controller
{
    public function index(){
        return view('admin.country.add-country');
    }
    public function saveCountry(Request $request){
        $productCountry = new ProductCountry();

        $productCountry->country_name = $request->country_name;
        $productCountry->publication_status = $request->publication_status;
        $productCountry->save();

        return redirect('/add-country')->with('message','Country save successsfully');
    }
    public function manageCountry(){
        $countries = ProductCountry::all();
        return view('admin.country.manage-country',['countries'=>$countries]);
    }
    public function unpublishCountry($id){
        $productCountry = ProductCountry::find($id);
        $productCountry->publication_status = 0;
        $productCountry->save();

        return redirect('/manage-country')->with('message','Country Unpublished');
    }
    public function publishCountry($id){
        $productCountry = ProductCountry::find($id);
        $productCountry->publication_status = 1;
        $productCountry->save();

        return redirect('/manage-country')->with('message','Country Published');
    }

    public function editCountry($id){
        $productCountry = ProductCountry::find($id);
        return view('admin.country.edit-country',['country'=>$productCountry]);

    }
    public function updateCountry(Request $request){
        $productCountry = ProductCountry::find($request->country_id);
        $productCountry->country_name = $request->country_name;
        $productCountry->publication_status = $request->publication_status;
        $productCountry->save();

        return redirect('/manage-country')->with('message','Country Updated');
    }
    public function deleteCountry($id){
        $productCountry = ProductCountry::find($id);
        $productCountry->delete();

        return redirect('/manage-country')->with('message','Country deleted');
    }

    public function addDivision(){
        $countries = ProductCountry::where('publication_status',1)->get();
        return view('admin.division.add-division',['countries'=>$countries]);
    }
    public function saveDivision(Request $request){
        $productDivision = new ProductDivision();

        $productDivision->country_id = $request->country_id;
        $productDivision->division_name = $request->division_name;
        $productDivision->publication_status = $request->publication_status;
        $productDivision->save();

        return redirect('/add-division')->with('message','Division save successsfully');
    }
    public function manageDivision(){
        $divisions = DB::table('product_divisions')
            ->join('product_countries','product_divisions.country_id','=','product_countries.id')
            ->select('product_divisions.*','product_countries.country_name')
            ->orderBy('product_divisions.country_id')
            ->get();
        return view('admin.division.manage-division',['divisions'=>$divisions]);
    }
    public function unpublishDivision($id){
        $productDivision = ProductDivision::find($id);
        $productDivision->publication_status = 0;
        $productDivision->save();

        return redirect('/manage-division')->with('message','Division Unpublished');
    }
    public function publishDivision($id){
        $productDivision = ProductDivision::find($id);
        $productDivision->publication_status = 1;
        $productDivision->save();

        return redirect('/manage-division')->with('message','Division Published');
    }

    public function editDivision($id){
        $countries = ProductCountry::where('publication_status',1)->get();
        $productDivision = ProductDivision::find($id);
        return view('admin.division.edit-division',[
            'countries'=>$countries,
            'division'=>$productDivision
        ]);
    }
    public function updateDivision(Request $request){
        $productDivision = ProductDivision::find($request->division_id);
        $productDivision->country_id = $request->country_id;
        $productDivision->division_name = $request->division_name;
        $productDivision->publication_status = $request->publication_status;
        $productDivision->save();

        return redirect('/manage-division')->with('message','Division Updated');
    }
    public function deleteDivision($id){
        $productDivision = ProductDivision::find($id);
        $productDivision->delete();

        return redirect('/manage-division')->with('message','Division deleted');
    }
    public function addDistrict(){
        $countries = ProductCountry::where('publication_status',1)->get();
        $divisions = ProductDivision::where('publication_status',1)->get();
        return view('admin.district.add-district',[
            'countries'=>$countries,
            'divisions'=>$divisions,
        ]);
    }
    public function saveDistrict(Request $request){
        $productDistrict = new ProductDistrict();

        $productDistrict->country_id = $request->country_id;
        $productDistrict->division_id = $request->division_id;
        $productDistrict->district_name = $request->district_name;
        $productDistrict->publication_status = $request->publication_status;
        $productDistrict->save();

        return redirect('/add-district')->with('message','District save successsfully');
    }
    public function manageDistrict(){
        $districts = DB::table('product_districts')
            ->join('product_countries','product_districts.country_id','=','product_countries.id')
            ->join('product_divisions','product_districts.division_id','=','product_divisions.id')
            ->select('product_districts.*','product_divisions.division_name','product_countries.country_name')
            ->orderBy('product_districts.id')
            ->get();
        return view('admin.district.manage-district',['districts'=>$districts]);
    }
    public function unpublishDistrict($id){
        $productDistrict = ProductDistrict::find($id);
        $productDistrict->publication_status = 0;
        $productDistrict->save();

        return redirect('/manage-district')->with('message','District Unpublished');
    }
    public function publishDistrict($id){
        $productDistrict = ProductDistrict::find($id);
        $productDistrict->publication_status = 1;
        $productDistrict->save();

        return redirect('/manage-district')->with('message','District Published');
    }

    public function editDistrict($id){
        $countries = ProductCountry::where('publication_status',1)->get();
        $divisions = ProductDivision::where('publication_status',1)->get();
        $productDistrict = ProductDistrict::find($id);
        return view('admin.district.edit-district',[
            'countries'=>$countries,
            'divisions'=>$divisions,
            'district'=>$productDistrict
        ]);
    }
    public function updateDistrict(Request $request){
        $productDistrict = ProductDistrict::find($request->district_id);
        $productDistrict->country_id = $request->country_id;
        $productDistrict->division_id = $request->division_id;
        $productDistrict->district_name = $request->district_name;
        $productDistrict->publication_status = $request->publication_status;
        $productDistrict->save();

        return redirect('/manage-district')->with('message','District Updated');
    }
    public function deleteDistrict($id){
        $productDistrict = ProductDistrict::find($id);
        $productDistrict->delete();

        return redirect('/manage-district')->with('message','District deleted');
    }
}
