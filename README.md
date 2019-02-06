# API Wrapper for ATD 

[![Latest Stable Version](https://poser.pugx.org/nickcheek/atdconnect/v/stable)](https://packagist.org/packages/nickcheek/atdconnect)
[![Latest Unstable Version](https://poser.pugx.org/nickcheek/atdconnect/v/unstable)](https://packagist.org/packages/nickcheek/atdconnect)
[![License](https://poser.pugx.org/nickcheek/atdconnect/license)](https://packagist.org/packages/nickcheek/atdconnect)
[![Total Downloads](https://poser.pugx.org/nickcheek/atdconnect/downloads)](https://packagist.org/packages/nickcheek/atdconnect)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/build-status/master)

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
getProductByCriteria();
getProductByKeyword();
```
#### Orders
``` php
placeOrder();
previewOrder();
```
#### Order Status
``` php
getOrderDetail();
getOrderStatusByCriteria();
```

### Todo

- [x] getLocationByCriteria
- [x] getLocationCutoffTimes
- [x] getDistributionCenter
- [x] getBrand(Brands)
- [x] getStyle(Brands)
- [x] getBrand(Products)
- [ ] getProductByCriteria
- [ ] getProductByKeyword
- [ ] placeOrder
- [ ] previewOrder
- [ ] getOrderDetail
- [ ] getOrderStatusByCriteria

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

