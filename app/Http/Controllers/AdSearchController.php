<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductDistrict;
use App\ProductDivision;
use App\ProductSubcategory;
use Illuminate\Http\Request;
use DB;
use App\Support\Collection;

class AdSearchController extends Controller
{
    public function index(Request $request){
        $searchValue = $request->search;

        $products = DB::table('product_details')
            ->where('product_details.ad_title','like','%'.$searchValue.'%')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.updated_at','DESC')
            ->get();

        $jobs = DB::table('job_details')
            ->where('job_details.ad_title','like','%'.$searchValue.'%')
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->where('job_details.publication_status','=','Published')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_districts.district_name')
            ->get();

        $items = $products->merge($jobs)->sortByDesc('updated_at')->values()->all();
        $products = (new Collection($items))->paginate(20);
//        return $products;

        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count','desc')->get();

        $divisions = ProductDivision::where('publication_status',1)
            ->withCount('divisionalProducts')
            ->orderBy('divisional_products_count','desc')->get();
        return view('frontend.all-ad.search-ad-view',[
//            'topAds'=>$topAds,
            'products'=>$products,
            'categories'=>$categories,
            'divisions'=>$divisions,
        ]);
    }

    public function categoryProductSearch($id) {
//        if ($id == 1 || 2 || 3 || 4 || 5 || 6 || 7 || 8 || 9 || 10 || 11 || 12){
        if ($id != 3 && $id !=19 ){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$id)
                ->join('product_details','product_informations.id','=','product_details.information_id')
                ->where('product_details.publication_status','=','Published')
                ->join('product_images','product_details.id','=','product_images.product_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('product_details.updated_at','DESC')
                ->paginate(20);
//                ->get();

            $cat = ProductCategory::where('id',$id)->first();
            $subCategories = ProductSubcategory::where('category_id',$id)
                ->withCount('subCategoryProducts')
                ->orderBy('sub_category_products_count','desc')->get();
            if ($id == 1){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category1Products')
                    ->orderBy('category1_products_count','desc')->get();
            }elseif ($id == 2){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category2Products')
                    ->orderBy('category2_products_count','desc')->get();
            }elseif ($id == 4){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category4Products')
                    ->orderBy('category4_products_count','desc')->get();
            }elseif ($id == 5){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category5Products')
                    ->orderBy('category5_products_count','desc')->get();
            }elseif ($id == 6){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category6Products')
                    ->orderBy('category6_products_count','desc')->get();
            }elseif ($id == 7){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category7Products')
                    ->orderBy('category7_products_count','desc')->get();
            }elseif ($id == 8){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category8Products')
                    ->orderBy('category8_products_count','desc')->get();
            }elseif ($id == 9){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category9Products')
                    ->orderBy('category9_products_count','desc')->get();
            }elseif ($id == 10){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category10Products')
                    ->orderBy('category10_products_count','desc')->get();
            }elseif ($id == 11){
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category11Products')
                    ->orderBy('category11_products_count','desc')->get();
            }else{
                $divisions = ProductDivision::where('publication_status',1)
                    ->withCount('category12Products')
                    ->orderBy('category12_products_count','desc')->get();
            }

            return view('frontend.all-ad.category-product-view',[
                'products'=>$products,
                'cat'=>$cat,
                'subCategories'=>$subCategories,
                'divisions'=>$divisions,
            ]);
        }elseif ($id == 3){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$id)
                ->join('job_details','product_informations.id','=','job_details.information_id')
                ->where('job_details.publication_status','=','Published')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('job_details.*','product_districts.district_name')
                ->orderBy('job_details.updated_at','DESC')
                ->paginate(20);
//                ->get();

            $cat = ProductCategory::where('id',$id)->first();
            $subCategories = ProductSubcategory::where('category_id',$id)
                ->withCount('subCategoryProducts')
                ->orderBy('sub_category_products_count','desc')->get();
            $divisions = ProductDivision::where('publication_status',1)
                ->withCount('category3Products')
                ->orderBy('category3_products_count','desc')->get();

            return view('frontend.all-ad.category-product-view',[
                'products'=>$products,
                'cat'=>$cat,
                'subCategories'=>$subCategories,
                'divisions'=>$divisions,
            ]);
        }elseif ($id == 19){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$id)
                ->join('property_details','product_informations.id','=','property_details.information_id')
                ->where('property_details.publication_status','=','Published')
                ->join('product_images','property_details.id','=','product_images.property_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('property_details.updated_at','DESC')
                ->paginate(20);
//                ->get();

            $cat = ProductCategory::where('id',$id)->first();
            $subCategories = ProductSubcategory::where('category_id',$id)
                ->withCount('subCategoryProducts')
                ->orderBy('sub_category_products_count','desc')->get();
            $divisions = ProductDivision::where('publication_status',1)
                ->withCount('category19Products')
                ->orderBy('category19_products_count','desc')->get();

            return view('frontend.all-ad.category-product-view',[
                'products'=>$products,
                'cat'=>$cat,
                'subCategories'=>$subCategories,
                'divisions'=>$divisions,
            ]);
        }

    }
    public function divisionalProductSearch($id) {
        $products = DB::table('product_informations')
            ->where('product_informations.division_id','=',$id)
            ->join('product_details','product_informations.id','=','product_details.information_id')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();

        $jobs = DB::table('product_informations')
            ->where('product_informations.division_id','=',$id)
            ->join('job_details','product_informations.id','=','job_details.information_id')
            ->where('job_details.publication_status','=','Published')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_districts.district_name')
            ->get();

        $items = $products->merge($jobs)->sortByDesc('updated_at')->values()->all();
        $products = (new Collection($items))->paginate(20);

        $div = ProductDivision::where('id',$id)->first();
        if ($id == 1){
            $categories = ProductCategory::withCount('division1products')
                ->orderBy('division1products_count','desc')->get();
        }elseif ($id == 2){
            $categories = ProductCategory::withCount('division2products')
                ->orderBy('division2products_count','desc')->get();
        }elseif ($id == 3){
            $categories = ProductCategory::withCount('division3products')
                ->orderBy('division3products_count','desc')->get();
        }elseif ($id == 4){
            $categories = ProductCategory::withCount('division4products')
                ->orderBy('division4products_count','desc')->get();
        }elseif ($id == 5){
            $categories = ProductCategory::withCount('division5products')
                ->orderBy('division5products_count','desc')->get();
        }elseif ($id == 6){
            $categories = ProductCategory::withCount('division6products')
                ->orderBy('division6products_count','desc')->get();
        }elseif ($id == 7){
            $categories = ProductCategory::withCount('division7products')
                ->orderBy('division7products_count','desc')->get();
        }elseif ($id == 8){
            $categories = ProductCategory::withCount('division8products')
                ->orderBy('division8products_count','desc')->get();
        }

        $districts = ProductDistrict::where('division_id',$id)
            ->withCount('districtAds')
            ->orderBy('district_ads_count','desc')->get();
        return view('frontend.all-ad.divisional-product-view',[
            'products'=>$products,
            'div'=>$div,
            'categories'=>$categories,
            'districts'=>$districts,
        ]);
    }
    public function categoryWithDivisionProduct($categoryId,$divisionId) {
        if ($categoryId != 3 && $categoryId !=19 ){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$categoryId)
                ->where('product_informations.division_id','=',$divisionId)
                ->join('product_details','product_informations.id','=','product_details.information_id')
                ->where('product_details.publication_status','=','Published')
                ->join('product_images','product_details.id','=','product_images.product_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('product_details.updated_at','DESC')
                ->paginate(20);

            if ($categoryId == 1){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category1Products')
                    ->orderBy('category1_products_count','desc')->get();
            }elseif ($categoryId == 4){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category4Products')
                    ->orderBy('category4_products_count','desc')->get();
            }elseif ($categoryId == 5){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category5Products')
                    ->orderBy('category5_products_count','desc')->get();
            }elseif ($categoryId == 6){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category6Products')
                    ->orderBy('category6_products_count','desc')->get();
            }elseif ($categoryId == 7){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category7Products')
                    ->orderBy('category7_products_count','desc')->get();
            }elseif ($categoryId == 8){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category8Products')
                    ->orderBy('category8_products_count','desc')->get();
            }elseif ($categoryId == 9){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category9Products')
                    ->orderBy('category9_products_count','desc')->get();
            }elseif ($categoryId == 11){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category11Products')
                    ->orderBy('category11_products_count','desc')->get();
            }elseif ($categoryId == 12){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category12Products')
                    ->orderBy('category12_products_count','desc')->get();
            }elseif ($categoryId == 13){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category13Products')
                    ->orderBy('category13_products_count','desc')->get();
            }elseif ($categoryId == 14){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category14Products')
                    ->orderBy('category14_products_count','desc')->get();
            }elseif ($categoryId == 15){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category15Products')
                    ->orderBy('category15_products_count','desc')->get();
            }elseif ($categoryId == 16){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category16Products')
                    ->orderBy('category16_products_count','desc')->get();
            }elseif ($categoryId == 17){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category17Products')
                    ->orderBy('category17_products_count','desc')->get();
            }elseif ($categoryId == 18){
                $districts = ProductDistrict::where('division_id',$divisionId)
                    ->withCount('category18Products')
                    ->orderBy('category18_products_count','desc')->get();
            }
        }elseif ($categoryId == 3){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$categoryId)
                ->where('product_informations.division_id','=',$divisionId)
                ->join('job_details','product_informations.id','=','job_details.information_id')
                ->where('job_details.publication_status','=','Published')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('job_details.*','product_districts.district_name')
                ->orderBy('job_details.updated_at','DESC')
                ->paginate(20);
//                ->get();

            $districts = ProductDistrict::where('division_id',$divisionId)
                ->withCount('category3Products')
                ->orderBy('category3_products_count','desc')->get();

        }elseif ($categoryId == 19){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$categoryId)
                ->where('product_informations.division_id','=',$divisionId)
                ->join('property_details','product_informations.id','=','property_details.information_id')
                ->where('property_details.publication_status','=','Published')
                ->join('product_images','property_details.id','=','product_images.property_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('property_details.updated_at','DESC')
                ->paginate(20);
//                ->get();

            $districts = ProductDistrict::where('division_id',$divisionId)
                ->withCount('category19Products')
                ->orderBy('category19_products_count','desc')->get();
        }
        $cat = ProductCategory::where('id',$categoryId)->first();
        $div = ProductDivision::where('id',$divisionId)->first();
        if ($divisionId == 1){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division1products')
                ->orderBy('division1products_count','desc')->get();
        }elseif ($divisionId == 2){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division2products')
                ->orderBy('division2products_count','desc')->get();
        }elseif ($divisionId == 3){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division3products')
                ->orderBy('division3products_count','desc')->get();
        }elseif ($divisionId == 4){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division4products')
                ->orderBy('division4products_count','desc')->get();
        }elseif ($divisionId == 5){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division5products')
                ->orderBy('division5products_count','desc')->get();
        }elseif ($divisionId == 6){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division6products')
                ->orderBy('division6products_count','desc')->get();
        }elseif ($divisionId == 7){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division7products')
                ->orderBy('division7products_count','desc')->get();
        }elseif ($divisionId == 8){
            $subCategories = ProductSubcategory::where('category_id',$categoryId)
                ->withCount('division8products')
                ->orderBy('division8products_count','desc')->get();
        }

        return view('frontend.all-ad.category-with-division-product',[
            'products'=>$products,
            'cat'=>$cat,
            'div'=>$div,
            'subCategories'=>$subCategories,
            'districts'=>$districts
        ]);
    }

    public function subcategoryWithDivisionProduct($id,$divisionId) {
        if ($id != 10 && $id !=11 && $id !=75 && $id !=76 && $id !=77 && $id !=78 && $id !=79 && $id !=80 && $id !=87 ){
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id','=',$id)
                ->where('product_informations.division_id','=',$divisionId)
                ->join('product_details','product_informations.id','=','product_details.information_id')
                ->where('product_details.publication_status','=','Published')
                ->join('product_images','product_details.id','=','product_images.product_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('product_details.updated_at','DESC')
                ->paginate(20);
        }elseif ($id == 10 || $id ==11){
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id','=',$id)
                ->where('product_informations.division_id','=',$divisionId)
                ->join('job_details','product_informations.id','=','job_details.information_id')
                ->where('job_details.publication_status','=','Published')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('job_details.updated_at','DESC')
                ->paginate(20);
        }else {
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id', '=', $id)
                ->where('product_informations.division_id', '=', $divisionId)
                ->join('property_details', 'product_informations.id', '=', 'property_details.information_id')
                ->where('property_details.publication_status', '=', 'Published')
                ->join('product_images', 'property_details.id', '=', 'product_images.property_id')
                ->join('product_subcategories', 'product_informations.subcategory_id', '=', 'product_subcategories.id')
                ->join('product_districts', 'product_informations.district_id', '=', 'product_districts.id')
                ->select('property_details.*', 'product_images.product_image1', 'product_subcategories.subcategory_name', 'product_districts.district_name')
                ->orderBy('property_details.updated_at', 'DESC')
                ->paginate(20);
        }

        $subCategory = ProductSubcategory::where('id',$id)->first();
        $cat = ProductCategory::where('id',$subCategory->category_id)->first();
        $div = ProductDivision::where('id',$divisionId)->first();
        $districts = ProductDistrict::where('division_id',$div->id)->get();

        return view('frontend.all-ad.subcategory-with-division-product',[
            'products'=>$products,
            'cat'=>$cat,
            'div'=>$div,
            'subCategory'=>$subCategory,
            'districts'=>$districts,
        ]);
    }

    public function subcategoryWithDistrictProduct($id,$districtId) {

        if ($id != 10 && $id !=11 && $id !=75 && $id !=76 && $id !=77 && $id !=78 && $id !=79 && $id !=80 && $id !=87 ){
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id','=',$id)
                ->where('product_informations.district_id','=',$districtId)
                ->join('product_details','product_informations.id','=','product_details.information_id')
                ->where('product_details.publication_status','=','Published')
                ->join('product_images','product_details.id','=','product_images.product_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('product_details.updated_at','DESC')
                ->paginate(20);
        }elseif ($id == 10 || $id ==11){
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id','=',$id)
                ->where('product_informations.district_id','=',$districtId)
                ->join('job_details','product_informations.id','=','job_details.information_id')
                ->where('job_details.publication_status','=','Published')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('job_details.updated_at','DESC')
                ->paginate(20);
        }else {
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id', '=', $id)
                ->where('product_informations.district_id','=',$districtId)
                ->join('property_details', 'product_informations.id', '=', 'property_details.information_id')
                ->where('property_details.publication_status', '=', 'Published')
                ->join('product_images', 'property_details.id', '=', 'product_images.property_id')
                ->join('product_subcategories', 'product_informations.subcategory_id', '=', 'product_subcategories.id')
                ->join('product_districts', 'product_informations.district_id', '=', 'product_districts.id')
                ->select('property_details.*', 'product_images.product_image1', 'product_subcategories.subcategory_name', 'product_districts.district_name')
                ->orderBy('property_details.updated_at', 'DESC')
                ->paginate(20);
        }

        $subCategory = ProductSubcategory::where('id',$id)->first();
        $cat = ProductCategory::where('id',$subCategory->category_id)->first();
        $district = ProductDistrict::where('id',$districtId)->first();
        $div = ProductDivision::where('id',$district->division_id)->first();

        return view('frontend.all-ad.subcategory-with-district-ad',[
            'products'=>$products,
            'cat'=>$cat,
            'div'=>$div,
            'subCategory'=>$subCategory,
            'district'=>$district
        ]);
    }

    public function categoryWithDistrictProduct($categoryId,$districtId) {
        if ($categoryId != 3 && $categoryId !=19 ){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$categoryId)
                ->where('product_informations.district_id','=',$districtId)
                ->join('product_details','product_informations.id','=','product_details.information_id')
                ->where('product_details.publication_status','=','Published')
                ->join('product_images','product_details.id','=','product_images.product_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('product_details.updated_at','DESC')
                ->paginate(20);
        }elseif ($categoryId == 3){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$categoryId)
                ->where('product_informations.district_id','=',$districtId)
                ->join('job_details','product_informations.id','=','job_details.information_id')
                ->where('job_details.publication_status','=','Published')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('job_details.*','product_districts.district_name')
                ->orderBy('job_details.updated_at','DESC')
                ->paginate(20);
//                ->get();

        }elseif ($categoryId == 19){
            $products = DB::table('product_informations')
                ->where('product_informations.category_id','=',$categoryId)
                ->where('product_informations.district_id','=',$districtId)
                ->join('property_details','product_informations.id','=','property_details.information_id')
                ->where('property_details.publication_status','=','Published')
                ->join('product_images','property_details.id','=','product_images.property_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('property_details.updated_at','DESC')
                ->paginate(20);
//                ->get();
        }
        $cat = ProductCategory::where('id',$categoryId)->first();
        $district = ProductDistrict::where('id',$districtId)->first();
        $div = ProductDivision::where('id',$district->division_id)->first();
        $subCategories = ProductSubcategory::where('category_id',$categoryId)
            ->withCount('subCategoryProducts')
            ->orderBy('sub_category_products_count','desc')->get();

        return view('frontend.all-ad.category-with-district-product',[
            'products'=>$products,
            'cat'=>$cat,
            'div'=>$div,
            'subCategories'=>$subCategories,
            'district'=>$district,
        ]);

    }

    public function subCategoryProductSearch($id) {
        if ($id != 10 && $id !=11 && $id !=75 && $id !=76 && $id !=77 && $id !=78 && $id !=79 && $id !=80 && $id !=87 ){
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id','=',$id)
                ->join('product_details','product_informations.id','=','product_details.information_id')
                ->where('product_details.publication_status','=','Published')
                ->join('product_images','product_details.id','=','product_images.product_id')
                ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
                ->orderBy('product_details.updated_at','DESC')
                ->paginate(20);
//                ->get();
        }elseif ($id == 10 || $id == 11){
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id','=',$id)
                ->join('job_details','product_informations.id','=','job_details.information_id')
                ->where('job_details.publication_status','=','Published')
                ->join('product_districts','product_informations.district_id','=','product_districts.id')
                ->select('job_details.*','product_districts.district_name')
                ->orderBy('job_details.updated_at','DESC')
                ->paginate(20);
//                ->get();
        }else {
            $products = DB::table('product_informations')
                ->where('product_informations.subcategory_id', '=', $id)
                ->join('property_details', 'product_informations.id', '=', 'property_details.information_id')
                ->where('property_details.publication_status', '=', 'Published')
                ->join('product_images', 'property_details.id', '=', 'product_images.property_id')
                ->join('product_subcategories', 'product_informations.subcategory_id', '=', 'product_subcategories.id')
                ->join('product_districts', 'product_informations.district_id', '=', 'product_districts.id')
                ->select('property_details.*', 'product_images.product_image1', 'product_subcategories.subcategory_name', 'product_districts.district_name')
                ->orderBy('property_details.updated_at', 'DESC')
                ->paginate(20);
//                ->get();
        }

        $subCategory = ProductSubcategory::where('id',$id)->first();
        $cat = ProductCategory::where('id',$subCategory->category_id)->first();
        $divisions = ProductDivision::where('publication_status',1)
            ->withCount('divisionalProducts')
            ->orderBy('divisional_products_count','desc')->get();
        return view('frontend.all-ad.subcategory-product-view',[
            'products'=>$products,
            'cat'=>$cat,
            'subCategory'=>$subCategory,
            'divisions'=>$divisions,
        ]);

    }
    public function districtAdSearch($id) {
        $products = DB::table('product_informations')
            ->where('product_informations.district_id','=',$id)
            ->join('product_details','product_informations.id','=','product_details.information_id')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();

        $jobs = DB::table('product_informations')
            ->where('product_informations.district_id','=',$id)
            ->join('job_details','product_informations.id','=','job_details.information_id')
            ->where('job_details.publication_status','=','Published')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_districts.district_name')
            ->get();

        $items = $products->merge($jobs)->sortByDesc('updated_at')->values()->all();
        $products = (new Collection($items))->paginate(20);

        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count','desc')->get();
        $district = ProductDistrict::where('id',$id)->first();
        $div = ProductDivision::where('id',$district->division_id)->first();
        return view('frontend.all-ad.district-ad-view',[
            'products'=>$products,
            'categories'=>$categories,
            'district'=>$district,
            'div'=>$div,
        ]);

    }
}
