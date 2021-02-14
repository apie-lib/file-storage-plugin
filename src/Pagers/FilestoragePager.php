<?php

namespace Apie\FileStoragePlugin\Pagers;

use Apie\FileStoragePlugin\DataLayers\FileStorageDataLayer;
use Iterator;
use LimitIterator;
use OutOfBoundsException;
use Pagerfanta\Adapter\AdapterInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FilestoragePager implements AdapterInterface
{
    /**
     * @var FileStorageDataLayer
     */
    private $dataLayer;

    /**
     * @var Iterator
     */
    private $iterator;

    /**
     * @var string
     */
    private $resourceClass;

    /**
     * @var array
     */
    private $context;

    public function __construct(FileStorageDataLayer $dataLayer, Iterator $iterator, string $resourceClass, array $context)
    {
        $this->dataLayer = $dataLayer;
        $this->iterator = $iterator;
        $this->resourceClass = $resourceClass;
        $this->context = $context;
    }

    public function getNbResults()
    {
        $count = 0;
        for ($this->iterator->rewind(); $this->iterator->valid(); $this->iterator->next()) {
            $count++;
        }
        return $count;
    }

    public function getSlice($offset, $length)
    {
        $list = new LimitIterator(
            $this->iterator,
            $offset,
            $length
        );
        $result = [];
        try {
            foreach ($list as $file) {
                /** @var SplFileInfo $file */
                $result[] = $this->dataLayer->retrieve($this->resourceClass, $file->getBasename(), $this->context);

            }
        } catch (OutOfBoundsException $outOfBoundsException) {
            $outOfBoundsException->getMessage(); // ignore
        }
        return $result;
    }
}
