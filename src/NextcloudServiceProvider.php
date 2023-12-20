<?php

declare(strict_types=1);

namespace Nino\FilesystemProviders;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;
use Sabre\DAV\Client as WebDAVClient;

class NextcloudServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Storage::extend('nextcloud', static function ($app, $config) {
            if (empty($config['userName'])) {
                throw new MissingNextcloudUsernameException();
            }

            $client = new WebDAVClient($config);
            $adapter = new WebDAVAdapter(
                $client,
                'remote.php/dav/files/' . $config['userName'] . '/' . ($config['directory'] ?? '')
            );

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}
