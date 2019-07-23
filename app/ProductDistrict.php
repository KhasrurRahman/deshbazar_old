<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDistrict extends Model
{
    public function districtAds()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published');
    }
    public function category1Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',1);
    }
    public function category3Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',3);
    }
    public function category4Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',4);
    }
    public function category5Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',5);
    }
    public function category6Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',6);
    }
    public function category7Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',7);
    }
    public function category8Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',8);
    }
    public function category9Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',9);
    }
    public function category11Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',11);
    }
    public function category12Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',12);
    }
    public function category13Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',13);
    }
    public function category14Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',14);
    }
    public function category15Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',15);
    }
    public function category16Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',16);
    }
    public function category17Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',17);
    }
    public function category18Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',18);
    }
    public function category19Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.category_id','=',19);
    }

//Subcategory products count

    public function subcategory1Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',1);
    }
    public function subcategory2Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',2);
    }
    public function subcategory3Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',3);
    }
    public function subcategory4Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',4);
    }
    public function subcategory5Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',5);
    }
    public function subcategory6Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',6);
    }
    public function subcategory7Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',7);
    }
    public function subcategory8Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',8);
    }
    public function subcategory9Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',9);
    }
    public function subcategory10Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',10);
    }
    public function subcategory11Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',11);
    }
    public function subcategory12Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',12);
    }
    public function subcategory13Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',13);
    }
    public function subcategory14Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',14);
    }
    public function subcategory15Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',15);
    }
    public function subcategory16Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',16);
    }
    public function subcategory17Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',17);
    }
    public function subcategory18Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',18);
    }
    public function subcategory19Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',19);
    }
    public function subcategory20Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',20);
    }
    public function subcategory21Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',21);
    }
    public function subcategory22Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',22);
    }
    public function subcategory23Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',23);
    }
    public function subcategory24Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',24);
    }
    public function subcategory25Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',25);
    }
    public function subcategory26Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',26);
    }
    public function subcategory27Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',27);
    }
    public function subcategory28Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',28);
    }
    public function subcategory29Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',29);
    }
    public function subcategory30Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',30);
    }
    public function subcategory31Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',31);
    }
    public function subcategory32Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',32);
    }
    public function subcategory33Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',33);
    }
    public function subcategory34Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',34);
    }
    public function subcategory35Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',35);
    }
    public function subcategory36Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',36);
    }
    public function subcategory37Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',37);
    }
    public function subcategory38Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',38);
    }
    public function subcategory39Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',39);
    }
    public function subcategory40Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',40);
    }
    public function subcategory41Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',41);
    }
    public function subcategory42Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',42);
    }
    public function subcategory43Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',43);
    }
    public function subcategory44Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',44);
    }
    public function subcategory45Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',45);
    }
    public function subcategory46Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',46);
    }
    public function subcategory47Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',47);
    }
    public function subcategory48Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',48);
    }
    public function subcategory49Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',49);
    }
    public function subcategory50Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',50);
    }
    public function subcategory51Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',51);
    }
    public function subcategory52Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',52);
    }
    public function subcategory53Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',53);
    }
    public function subcategory54Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',54);
    }
    public function subcategory55Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',55);
    }
    public function subcategory56Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',56);
    }
    public function subcategory57Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',57);
    }
    public function subcategory58Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',58);
    }
    public function subcategory59Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',59);
    }
    public function subcategory60Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',60);
    }
    public function subcategory61Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',61);
    }
    public function subcategory62Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',62);
    }
    public function subcategory63Products()
    {
        return $this->hasMany(
            'App\ProductInformation',
            'district_id',
            'id'
        )->where('product_informations.publication_status','=','Published')
            ->where('product_informations.subcategory_id','=',63);
    }

}
