<?php

namespace Apie\FileStoragePlugin\Exceptions;


use Apie\Core\Exceptions\ApieException;

class CouldNotWriteFileException extends ApieException
{
    public function __construct(string $filename)
    {
        parent::__construct(503, 'Could not write file "' . $filename . '""');
    }
}
