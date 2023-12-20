# laravel-nextcloud-fs

This package provides a Nextcloud driver for Laravel's Filesystem.

It's a wrapper around Flysystem's [WebDAV Adapter](https://flysystem.thephpleague.com/docs/adapter/webdav/).

## Compatibility
Laravel : 10, 9

PHP : 8.3, 8.2, 8.1

## Install

Via Composer

``` bash
composer require nino/laravel-nextcloud-fs
```

## Usage

Generate a Nextcloud app password on the desired user's account: Settings > Security > Devices & sessions.

Create a `nextcloud` filesystem disk:

``` php
// config/filesystems.php

'disks' => [
	...
    'nextcloud' => [
        'driver'     => 'nextcloud',
        'baseUri'    => 'https://nextcloud.example.org',
        'userName'   => 'laravel',
        'password'   => 'password-generated-by-nextcloud',
        'directory' => '', // optionnal: set a path as visible for nextcloud user defined in userName
    ],
	...
];
```

Use it as any Laravel filesystem : https://laravel.com/docs/filesystem

```php
use Illuminate\Support\Facades\Storage;
 
Storage::disk('nextcloud')->put('example.txt', 'Contents');
```

Note that file visibility features aren't supported (it's a WebDAV limitation).

## Contributing

Merge requests, bug reports and suggestions are welcome.

Please follow the following rules on your pull requests:
- One pull request per feature.
- Make sure each individual commit in your pull request is meaningful.
- Document any change in behaviour.
- Update the tests if necessary.

## License

This library is licensed under the  MIT License. Please read the [license file](LICENSE) for more information.

It's based on the work of Protone Media : [pbmedia/laravel-webdav](https://packagist.org/packages/pbmedia/laravel-webdav) (also under MIT license).
