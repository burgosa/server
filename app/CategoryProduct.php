<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model {

	protected $table = 'categories_products';
    
    protected $fillable = array('category_id','product_id');

}
