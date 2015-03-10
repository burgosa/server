<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model {

	protected $table = 'brands_products';
    
    protected $fillable = array('brand_id','product_id');

}
