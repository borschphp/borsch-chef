# Borsch Chef

Because you need a good chef to cook a good borsch.  
Chef is a CLI for Borsch apps.

This package is part of the Borsch Framework.

## Installation

Via [composer](https://getcomposer.org/) :

`composer require borschphp/chef`

## Integration in Borsch Framework

At the root of your project, create a file `chef.php` containing:

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Borsch\Chef\Chef;

$chef = new Chef();
$chef->run();
```

## Usage

Currently, you can create new Handlers and Middlewares.  
For more information:
```bash
php chef.php -h
```

## License

The package is licensed under the MIT license. See [License File](https://github.com/borschphp/borsch-chef/blob/master/LICENSE.md) for more information.