<?php

namespace Pbmedia\FilesystemProviders;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;
use Sabre\DAV\Client as WebDAVClient;

class WebDAVServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('webdav', function ($app, $config) {
            $client = new WebDAVClient($config);

            $adapter = new WebDAVAdapter($client);

            return new Filesystem($adapter);
        });
    }

    public function register()
    {

    }
}
