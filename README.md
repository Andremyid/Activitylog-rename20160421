# Activitylog

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
