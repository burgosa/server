<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	protected $table = 'brands';

	protected $fillable = array('name', 'slug', 'description','is_active');

	public function createdBy()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }
    /*
    public function categories()
    {   
        return $this->belongsToMany('App\Category','categories_products')->withPivot('category_id', 'product_id');

    }
    */

}
