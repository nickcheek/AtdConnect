# API Wrapper for ATD 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/atdconnect.svg?style=flat-square)](https://packagist.org/packages/nickcheek/atdconnect)


PHP Soap API wrapper that integrates WSS security in to the header of the soap call.

## Installation

You can install the package via composer:

```bash
composer require nickcheek/atdconnect
```

## Usage
Add the library to the top of your controller
``` php
use \Nickcheek\Atdconnect\Atdconnect;
```

declare your variables and make the call
``` php
$client = new Atdconnect($user,$password,$client);
$response = $client->getStyle($location);
echo "<pre>";
var_dump($response); 
echo "</pre>";

```


## Available Methods
#### Location
``` php
getLocationByCriteria();
getLocationCutoffTimes($location);
getDistributionCenter($distributioncenter);
```
#### Brand
``` php
getBrand($location,$group);
getStyle($location,$brand);
```
#### Products
``` php
getProdBrand($location,$group);
```



### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nick@nicholascheek.com instead of using the issue tracker.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).