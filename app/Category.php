<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';

	protected $fillable = array('name', 'slug', 'description','is_active','category_id');

	public function createdBy()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }

    public function subcategories()
    {   
        return $this->belongsTo('App\Cotegory');

    }

    public function products()
    {   
        return $this->belongsToMany('App\Product')->withPivot('product_id', 'category_id');

    }

}
