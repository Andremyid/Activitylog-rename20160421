# User Activitylog Log

## Installation

This package can be installed through Composer.
```bash
composer require andremyid/activitylog
```

This service provider must be registered.
```php
// config/app.php

'providers' => [
    '...',
    'Andremyid\Activitylog\ActivitylogServiceProvider',
];
```

The configuration automaticly will be written to  ```config/activitylog.php```. The options provided are self explanatory.

And database migration automaticly will be written to database  ```migrations/2016_00_02_000001_create_user_activity_logs_table.php```.

## Usage

Optimized class database migration, then migrated it.
```bash
dump-autoload
```

### Manual logging

Logging some activity is very simple.
```php
/*
  The log-function takes two parameters:
  	- $text: the activity you wish to log.
  	- $user: optional can be an user id or a user object.
  	         if not proved the id of Auth::user() will be used

*/
Activity::log('Some activity that you wish to log');
```
The string you pass to function gets written in a db-table together with a timestamp and the ip address.
