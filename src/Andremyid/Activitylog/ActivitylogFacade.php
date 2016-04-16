<?php namespace Andremyid\Activitylog;

use Illuminate\Support\Facades\Facade;

class ActivityLogFacade extends Facade {
	
	protected static function getFacadeAccessor()
	{
		return 'activity';
	}

}
