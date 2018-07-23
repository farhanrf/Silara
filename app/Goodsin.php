<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goodsin extends Model
{
   use SoftDeletes;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'goodsins';

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

   public function device()
	{
		return $this->belongsTo('App\Device', 'device_id');
	}

	public function device_id()
	{
		return $this->belongsTo('App\Device', 'device_id');
	}

   public function location()
	{
		return $this->belongsTo('App\Location', 'location_id');
	}

	public function location_id()
	{
		return $this->belongsTo('App\Location', 'location_id');
	}

   public function category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}

	public function category_id()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}

   public function users()
	{
		return $this->belongsTo('App\User', 'users_id');
	}

	public function users_id()
	{
		return $this->belongsTo('App\User', 'users_id');
	}
}
