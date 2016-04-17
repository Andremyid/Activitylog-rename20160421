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
