# log
Log package for Bone Mvc Framework
## installation
Use Composer
```
composer require delboy1978uk/bone-log
```
## usage
Simply add to the `config/packages.php`
```php
<?php

// use statements here
use Bone\Log\LogPackage;

return [
    'packages' => [
        // packages here...,
        LogPackage::class,
    ],
    // ...
];
```