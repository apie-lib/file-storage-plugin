<?php

namespace Apie\FileStoragePlugin;

use Apie\Core\Interfaces\ApiResourceFactoryInterface;
use Apie\Core\PluginInterfaces\ApieAwareInterface;
use Apie\Core\PluginInterfaces\ApieAwareTrait;
use Apie\Core\PluginInterfaces\ApiResourceFactoryProviderInterface;
use Apie\FileStoragePlugin\ResourceFactories\FileStorageDataLayerFactory;

class FileStoragePlugin implements ApiResourceFactoryProviderInterface, ApieAwareInterface
{
    use ApieAwareTrait;

    private $path;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getApiResourceFactory(): ApiResourceFactoryInterface
    {
        return new FileStorageDataLayerFactory($this->path, $this->getApie()->getIdentifierExtractor());
    }
}
