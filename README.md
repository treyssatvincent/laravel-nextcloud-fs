# laravel-webdav

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This package provides a WebDAV driver for Laravel's Filesystem. Laravel 5.0 and higher supported.

## We are looking for beta testers!
We are currently building a *sophisticated health checker for your Laravel applications* called [Upserver.online](https://upserver.online). We will launch a private beta in the coming weeks so please join the mailing list to get **early access**! If you want to know more, you can also read the [official announcement](https://mailchi.mp/upserver/this-is-upserver-online) or follow us on [Twitter](https://twitter.com/UpserverOnline).

## Install

Via Composer

``` bash
$ composer require pbmedia/laravel-webdav
```

## Usage

Register the service provider in your app.php config file (Laravel 5.4 and lower only):

``` php
// config/app.php

'providers' => [
    ...
    Pbmedia\FilesystemProviders\WebDAVServiceProvider::class
    ...
];
```

Create a webdav filesystem disk:

``` php
// config/filesystems.php

'disks' => [
	...
	'webdav' => [
	    'driver'     => 'webdav',
	    'baseUri'    => 'https://mywebdavstorage.com',
	    'userName'   => 'protonemedia',
	    'password'   => 'supersecretpassword',
	    'pathPrefix' => 'backups', // optional
	],
	...
];
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email info@protone.media instead of using the issue tracker.

## Credits

- [Pascal Baljet][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pbmedia/laravel-webdav.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pbmedia/laravel-webdav.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pbmedia/laravel-webdav
[link-downloads]: https://packagist.org/packages/pbmedia/laravel-webdav
[link-author]: https://github.com/pascalbaljet
[link-contributors]: ../../contributors
