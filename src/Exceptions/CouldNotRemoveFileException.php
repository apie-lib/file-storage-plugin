<?php

namespace Apie\FileStoragePlugin\Exceptions;

use Apie\Core\Exceptions\ApieException;

class CouldNotRemoveFileException extends ApieException
{
    public function __construct(string $filename)
    {
        parent::__construct(503, 'Could not remove file "' . $filename . '""');
    }
}
