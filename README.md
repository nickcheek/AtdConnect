# API Wrapper for ATD 

[![Latest Stable Version](https://poser.pugx.org/nickcheek/atdconnect/v/stable)](https://packagist.org/packages/nickcheek/atdconnect)
[![Latest Unstable Version](https://poser.pugx.org/nickcheek/atdconnect/v/unstable)](https://packagist.org/packages/nickcheek/atdconnect)
[![License](https://poser.pugx.org/nickcheek/atdconnect/license)](https://packagist.org/packages/nickcheek/atdconnect)
[![Total Downloads](https://poser.pugx.org/nickcheek/atdconnect/downloads)](https://packagist.org/packages/nickcheek/atdconnect)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/AtdConnect/build-status/master)

PHP Soap API wrapper for American Tire Distributor that integrates WSS security in to the header of the soap call.

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
Add the ATD credentials in config
``` php
'client'=> 'client_name',
'user'	=> 'your_username',
'pass'	=> 'your_password',
'location => 'your_location_id' 
```

set your location and declare your variables
``` php
$client = new Atdconnect();
$response = $client->getStyle('goodyear');
return $response

```
You can also use the array builder functions
``` php
$client = new Atdconnect();
$search = $client->setSizeSearch('3055520');
return $client->getProductByCriteria($search);
```


## Available Methods
#### Location
``` php
getLocationByCriteria();
getLocationCutoffTimes();
getDistributionCenter($distributioncenter);
```
#### Brand
``` php
getBrand($group);
getStyle($brand);
```
#### Products
``` php
getProdBrand($group);
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

