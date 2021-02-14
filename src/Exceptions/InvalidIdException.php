<?php
namespace Apie\FileStoragePlugin\Exceptions;

use Apie\Core\Exceptions\ApieException;
use Apie\Core\Exceptions\LocalizationableException;
use Apie\Core\Exceptions\LocalizationInfo;

class InvalidIdException extends ApieException implements LocalizationableException
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        parent::__construct(500, 'Id "' . $id . '" is not valid as identifier');
    }

    public function getI18n(): LocalizationInfo
    {
        return new LocalizationInfo(
            'validation.id',
            [
                'id' => $this->id
            ]
        );
    }
}
