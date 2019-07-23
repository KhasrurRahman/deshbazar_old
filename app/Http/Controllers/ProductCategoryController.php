<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductSubcategory;
use Illuminate\Http\Request;
use Image;
use DB;

class ProductCategoryController extends Controller
{
    public function index(){
        return view('admin.product-category.add-product-category');
    }
    public function saveProductCategory(Request $request){
        $productCategory = new ProductCategory();

        $categoryImage = $request->file('category_image');
        $imageName = $categoryImage->getClientOriginalName();
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        $image = Image::make($categoryImage)->resize(40,40);
        $image-> save($imageUrl);

        $productCategory->category_name = $request->category_name;
        $productCategory->description = $request->description;
        $productCategory->category_image = $imageUrl;
        $productCategory->publication_status = $request->publication_status;
        $productCategory->save();

        return redirect('/add-product-category')->with('message','Product Category info save successsfully');
    }
    public function manageProductCategory(){
        $productCategories = ProductCategory::all();
        return view('admin.product-category.manage-product-category',['categories'=>$productCategories]);
    }
    public function unpublishedCategory($id){
        $productCategory = ProductCategory::find($id);
        $productCategory->publication_status = 0;
        $productCategory->save();

        return redirect('/manage-product-category')->with('message','Category info Unpublished');
    }
    public function publishedCategory($id){
        $productCategory = ProductCategory::find($id);
        $productCategory->publication_status = 1;
        $productCategory->save();

        return redirect('/manage-product-category')->with('message','Category info Published');
    }

    public function editCategory($id){
        $productCategory = ProductCategory::find($id);
        return view('admin.product-category.edit-product-category',['category'=>$productCategory]);

    }
    public function updateCategory(Request $request){
        $categoryImage = $request->file('category_image');
        if($categoryImage){
            $productCategory = ProductCategory::find($request->category_id);
            unlink($productCategory->category_image);

            $imageName = $categoryImage->getClientOriginalName();
            $directory = 'product-images/';
            $imageUrl = $directory.$imageName;
            $image = Image::make($categoryImage)->resize(40,40);
            $image->save($imageUrl);

            $productCategory->category_name = $request->category_name;
            $productCategory->description = $request->description;
            $productCategory->category_image = $imageUrl;
            $productCategory->publication_status = $request->publication_status;
            $productCategory->save();
        }else{
            $productCategory = ProductCategory::find($request->category_id);
            $productCategory->category_name = $request->category_name;
            $productCategory->description = $request->description;
            $productCategory->publication_status = $request->publication_status;
            $productCategory->save();
        }
        return redirect('/manage-product-category')->with('message','Category info Updated');
    }
    public function deleteCategory($id){
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();

        return redirect('/manage-product-category')->with('message','Category info deleted');
    }

    // Product Subcategory
    public function addProductSubcategory(){
        $categories = ProductCategory::where('publication_status',1)->get();
        return view('admin.product-subcategory.add-product-subcategory',['categories'=>$categories]);
    }
    public function saveProductSubcategory(Request $request){
        $productSubcategory = new ProductSubcategory();

        $productSubcategory->category_id = $request->category_id;
        $productSubcategory->subcategory_name = $request->subcategory_name;
        $productSubcategory->publication_status = $request->publication_status;
        $productSubcategory->save();

        return redirect('/add-product-subcategory')->with('message','Product Subcategory info save successsfully');
    }
    public function manageProductSubcategory(){
        $productSubcategories = DB::table('product_subcategories')
            ->join('product_categories','product_subcategories.category_id','=','product_categories.id')
            ->select('product_subcategories.*','product_categories.category_name')
            ->orderBy('product_subcategories.category_id')
            ->get();
        return view('admin.product-subcategory.manage-product-subcategory',['productSubcategories'=>$productSubcategories]);
    }
    public function unpublishedSubcategory($id){
        $productSubcategory = ProductSubcategory::find($id);
        $productSubcategory->publication_status = 0;
        $productSubcategory->save();

        return redirect('/manage-product-subcategory')->with('message','Subcategory info Unpublished');
    }
    public function publishedSubcategory($id){
        $productSubcategory = ProductSubcategory::find($id);
        $productSubcategory->publication_status = 1;
        $productSubcategory->save();

        return redirect('/manage-product-subcategory')->with('message','Subcategory info Published');
    }
    public function editSubcategory($id){
        $productSubcategory = ProductSubcategory::find($id);
        $cat = ProductCategory::where('id',$productSubcategory->category_id)->first();
        $categories = ProductCategory::where('publication_status',1)->get();
        return view('admin.product-subcategory.edit-product-subcategory',[
            'subcategory'=>$productSubcategory,
            'cat'=>$cat,
            'categories'=>$categories,
            ]);

    }
    public function updateSubcategory(Request $request){
        $productSubcategory = ProductSubcategory::find($request->subcategory_id);
        $productSubcategory->category_id = $request->category_id;
        $productSubcategory->subcategory_name = $request->subcategory_name;
        $productSubcategory->publication_status = $request->publication_status;
        $productSubcategory->save();

        return redirect('/manage-product-subcategory')->with('message','Subcategory info Updated');
    }
    public function deleteSubcategory($id){
        $productSubcategory = ProductSubcategory::find($id);
        $productSubcategory->delete();

        return redirect('/manage-product-subcategory')->with('message','Subcategory info deleted');
    }
}
