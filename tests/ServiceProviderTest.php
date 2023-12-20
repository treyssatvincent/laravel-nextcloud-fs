<?php

namespace Nino\FilesystemProviders\Tests;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;
use League\Flysystem\WebDAV\WebDAVAdapter;
use Nino\FilesystemProviders\NextcloudServiceProvider;
use Orchestra\Testbench\TestCase;

class ServiceProviderTest extends TestCase
{
    private const CONFIG_KEY = 'filesystems.disks.nextcloud';
    private const BASE_URI = 'https://nextcloud.example.org';
    private const USERNAME = 'laravel';
    private const PASSWORD = 'password-generated-by-nextcloud';

    protected function getPackageProviders($app): array
    {
        return [NextcloudServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set(self::CONFIG_KEY, [
            'driver'     => 'nextcloud',
            'baseUri'    => self::BASE_URI,
            'userName'   => self::USERNAME,
            'password'   => self::PASSWORD,
        ]);
    }

    /** @test */
    public function it_registers_a_webdav_driver(): void
    {
        $filesystem = Storage::disk('nextcloud');

        $this->assertInstanceOf(WebDAVAdapter::class, $filesystem->getAdapter());
    }

    /** @test */
    public function it_implements_illuminate_filesystem(): void
    {
        $filesystem = Storage::disk('nextcloud');
        $className = \Illuminate\Contracts\Filesystem\Filesystem::class;

        $this->assertTrue(
            isset(class_implements($filesystem)[$className])
        );
    }

    /** @test */
    public function it_can_have_an_optional_directory(): void
    {
        $path = ltrim(fake()->filePath(), '/');
        $fileName = fake()->word() . '.' . fake()->fileExtension();

        $this->app['config']->set(self::CONFIG_KEY . '.directory', $path);
        $filesystem = Storage::disk('nextcloud');

        $this->assertSame(
            sprintf(
                '%s/remote.php/dav/files/%s/%s/%s',
                self::BASE_URI,
                self::USERNAME,
                $path,
                $fileName
            ),
            $filesystem->getAdapter()->publicUrl($fileName, new Config())
        );
    }
}
