<?php namespace Andremyid\Activitylog\Handlers;

use Log;

class ActivitylogHandler implements ActivitylogHandlerInterface {

	public function log($text, $user = '', $attributes = [])
	{
		$logText = $text;
		$logText .= ($user ? ' (by user_id '  . $user->id . ')' : '');
		$logText .= (count($attributes)) ? PHP_EOL . print_r($attributes, true) : '';

		Log::info($logText);

		return true;
	}

	public function cleanLog($maxAgeInMonths)
	{
		return true;
	}

}
