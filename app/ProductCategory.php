<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published');
    }
//    public function jobs()
//    {
//        return $this->hasManyThrough(
//            'App\JobDetail',
//            'App\ProductInformation',
//            'category_id',
//            'information_id',
//            'id',
//            'id'
//        )->where('job_details.publication_status','=','Published');
//    }

    public function division1products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',1);
    }
    public function division2products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',2);
    }
    public function division3products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',3);
    }
    public function division4products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',4);
    }
    public function division5products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',5);
    }
    public function division6products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',6);
    }
    public function division7products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',7);
    }
    public function division8products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'category_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.division_id','=',8);
    }


}
