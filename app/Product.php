<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';

	protected $fillable = array('name', 'slug', 'description','is_active', 'special_price', 'price');

	public function createdBy()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }

    public function categories()
    {   
        return $this->belongsToMany('App\Category','categories_products')->withPivot('category_id', 'product_id');

    }

}
