<?php namespace Andremyid\Activitylog\Handlers;

interface ActivitylogHandlerInterface {

	public function log($text, $user = '', $attributes = []);

	public function cleanLog($maxAgeInMonths);

}
