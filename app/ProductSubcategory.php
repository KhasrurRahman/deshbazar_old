<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    public function subCategoryProducts()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published');
    }
    public function division1products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',1);
    }
    public function division2products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',2);
    }
    public function division3products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',3);
    }
    public function division4products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',4);
    }
    public function division5products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',5);
    }
    public function division6products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',6);
    }
    public function division7products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',7);
    }
    public function division8products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'subcategory_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.division_id','=',8);
    }
}
