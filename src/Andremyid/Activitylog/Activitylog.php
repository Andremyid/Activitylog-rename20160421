<?php namespace Andremyid\Activitylog;

use Auth;
use Config;
use Request;

class Activitylog {

	protected $logHandlers = [];

	public function __construct(Handlers\ActivitylogHandlerInterface $handler)
	{
		$this->logHandlers[] = $handler;
		if (! empty(Config::get('activitylog.alsoLogInDefaultLog'))) {
			$this->logHandlers[] = new Handlers\ActivitylogHandler();
		}
	}

	public function log($text, $user = '')
	{
		if ($user == '') {
			$user = Auth::user() ? : '';
		}

		if (is_numeric($user)) {
			$user = Config::get('auth.model')->findOrFail($user);
		}

		$ipAddress = Request::getClientIp();

		foreach ($this->logHandlers as $logHandler) {
			$logHandler->log($text, $user, compact('ipAddress'));
		}

		return true;
	}

	public function cleanLog()
	{
		foreach ($this->logHandlers as $logHandler) {
			$logHandler->cleanLog(Config::get('activitylog.deleteRecordsOlderThanMonths'));
		}

		return true;
	}

}
