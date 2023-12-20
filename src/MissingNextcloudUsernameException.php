<?php

namespace Nino\FilesystemProviders;

class MissingNextcloudUsernameException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Missing userName in filesystems.disks.nextcloud (config/filesystems.php)");
    }
}
