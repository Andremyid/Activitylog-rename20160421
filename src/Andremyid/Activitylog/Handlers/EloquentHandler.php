<?php namespace Andremyid\Activitylog\Handlers;

use Andremyid\Activitylog\Models\UserActivityLog;
use Carbon\Carbon;

class EloquentHandler implements ActivitylogHandlerInterface {

	public function log($text, $user = '', $attributes = [])
	{
		UserActivityLog::create([
			'text'       => $text,
			'user_id'    => ($user ? $user->id : null),
			'ip_address' => $attributes['ipAddress']
			]);

		return true;
	}

	public function cleanLog($maxAgeInMonths)
	{
		$minimumDate = Carbon::now()->subMonths($maxAgeInMonths);
		UserActivityLog::where('created_at', '<=', $minimumDate)->delete();

		return true;
	}

}
