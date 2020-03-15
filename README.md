# log
[![Latest Stable Version](https://poser.pugx.org/delboy1978uk/bone-log/v/stable)](https://packagist.org/packages/delboy1978uk/bone-log) [![Total Downloads](https://poser.pugx.org/delboy1978uk/bone/downloads)](https://packagist.org/packages/delboy1978uk/bone) [![Latest Unstable Version](https://poser.pugx.org/delboy1978uk/bone-log/v/unstable)](https://packagist.org/packages/delboy1978uk/bone-log) [![License](https://poser.pugx.org/delboy1978uk/bone-log/license)](https://packagist.org/packages/delboy1978uk/bone-log)<br />
[![Build Status](https://travis-ci.org/delboy1978uk/bone-log.png?branch=master)](https://travis-ci.org/delboy1978uk/bone-log) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/bone-log/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-log/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/bone-log/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-log/?branch=master)<br />

Log package for Bone Framework
## installation
bone-log is a core dependency of Bone Framework, as so comes installed as standard. See `config/bone-log.php` in the 
skeleton project
## usage
To get a logger into your controllers, make them implement `Bone\Log\LoggerAwareInterface`, and use the trait
`Bone\Log\Traits\HasLoggerTrait`. 
```php
<?php

namespace Whatever;

use Bone\Controller\Controller;
use Bone\Log\LoggerAwareInterface;
use Bone\Log\Traits\HasLoggerTrait;

class WhateverController extends Controller implements LoggerAwareInterface
{
    use HasLoggerTrait;

    // your code here
}
```
Then in your package registration class, pass your controller
into `Bone\Controller\Init::controller()`:
```php
return  Init::controller(new WhateverController(), $c);
```
You can now call `$this->getLogger();` and you will now have your PSR-3 logger at your disposal. See `monolog/monolog` 
for details.