<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

	protected $table = 'cities';

	protected $fillable = array('name', 'slug','is_active','locale','timezone');

	public function createdBy()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by','id');
    }

}
