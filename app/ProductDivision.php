<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDivision extends Model
{
    public function divisionalProducts()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published');
    }
    public function category1Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
        ->where('product_informations.category_id','=',1);
    }
    public function category2Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',2);
    }
    public function category3Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',3);
    }
    public function category4Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',4);
    }
    public function category5Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',5);
    }
    public function category6Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',6);
    }
    public function category7Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',7);
    }
    public function category8Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',8);
    }
    public function category9Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',9);
    }
    public function category10Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',10);
    }
    public function category11Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',11);
    }
    public function category12Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',12);
    }
    public function category13Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',13);
    }
    public function category14Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',14);
    }
    public function category19Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'division_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',19);
    }


}
