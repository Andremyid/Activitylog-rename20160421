<?php namespace Andremyid\Activitylog\Models;

use Eloquent;
use Config;

class UserActivityLog extends Eloquent {

	protected $fillable = [];
	protected $guarded  = ['id'];

	public function user()
	{
		return $this->belongsTo(Config::get('auth.model', 'user_id'));
	}

}
