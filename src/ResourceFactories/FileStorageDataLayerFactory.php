<?php

namespace Apie\FileStoragePlugin\ResourceFactories;

use Apie\Core\IdentifierExtractor;
use Apie\Core\Interfaces\ApiResourceFactoryInterface;
use Apie\Core\Interfaces\ApiResourcePersisterInterface;
use Apie\Core\Interfaces\ApiResourceRetrieverInterface;
use Apie\FileStoragePlugin\DataLayers\FileStorageDataLayer;

class FileStorageDataLayerFactory implements ApiResourceFactoryInterface
{
    private $path;

    /**
     * @var IdentifierExtractor
     */
    private $identifierExtractor;

    public function __construct(string $path, IdentifierExtractor $identifierExtractor)
    {
        $this->path = $path;
        $this->identifierExtractor = $identifierExtractor;
    }

    /**
     * Returns true if this factory can create this identifier.
     *
     * @param string $identifier
     * @return bool
     */
    public function hasApiResourceRetrieverInstance(string $identifier): bool
    {
        return $identifier === FileStorageDataLayer::class;
    }

    /**
     * Gets an instance of ApiResourceRetrieverInstance
     * @param string $identifier
     * @return ApiResourceRetrieverInterface
     */
    public function getApiResourceRetrieverInstance(string $identifier): ApiResourceRetrieverInterface
    {
        return new FileStorageDataLayer($this->path, $this->identifierExtractor);
    }

    /**
     * Returns true if this factory can create this identifier.
     *
     * @param string $identifier
     * @return bool
     */
    public function hasApiResourcePersisterInstance(string $identifier): bool
    {
        return $identifier === FileStorageDataLayer::class;
    }

    /**
     * Gets an instance of ApiResourceRetrieverInstance
     * @param string $identifier
     * @return ApiResourcePersisterInterface
     */
    public function getApiResourcePersisterInstance(string $identifier): ApiResourcePersisterInterface
    {
        return new FileStorageDataLayer($this->path, $this->identifierExtractor);
    }
}
