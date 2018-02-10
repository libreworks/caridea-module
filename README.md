# caridea-module
Caridea is a miniscule PHP application library. This shrimpy fellow is what you'd use when you just want some helping hands and not a full-blown framework.

![](http://libreworks.com/caridea-100.png)

This is its module loader. You can use it to write extensible applications.

[![Packagist](https://img.shields.io/packagist/v/caridea/module.svg)](https://packagist.org/packages/caridea/module)
[![Build Status](https://travis-ci.org/libreworks/caridea-module.svg)](https://travis-ci.org/libreworks/caridea-module)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/libreworks/caridea-module/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/libreworks/caridea-module/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/libreworks/caridea-module/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/libreworks/caridea-module/?branch=master)

## Installation

You can install this library using Composer:

```console
$ composer require caridea/module
```

* The master branch (version 3.x) of this project requires PHP 7.1 and depends on `caridea/container`.
* Version 2.x of this project requires PHP 7.0 and depends on `caridea/container`.

## Compliance

Releases of this library will conform to [Semantic Versioning](http://semver.org).

Our code is intended to comply with [PSR-1](http://www.php-fig.org/psr/psr-1/), [PSR-2](http://www.php-fig.org/psr/psr-2/), and [PSR-4](http://www.php-fig.org/psr/psr-4/). If you find any issues related to standards compliance, please send a pull request!

## Features

The `Caridea\Module\System` class has three dependency containers: one for configuration properties, one for *back-end* objects and one for *front-end* objects. Modules can register objects in these containers. The configuration container is the parent of the back-end container, which in turn is parent of the front-end container.

```php
namespace Acme;

class MyModule extends \Caridea\Module\Module
{
}

$modules = ['Acme\MyModule'];
$conf = []; // Read in your configuration from somewhere.
$system = new \Caridea\Module\System($modules, $conf);

$myObj = $system->getFrontendContainer()->get('myObject');
```
