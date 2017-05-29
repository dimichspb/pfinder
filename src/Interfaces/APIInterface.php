<?php
namespace Pfinder\Interfaces;

/**
 * Interface APIInterface
 *
 * Provides the method to sort collection
 *
 * @package Pfinder\Interfaces
 */
interface APIInterface
{
    /**
     * Sorts collection of objects provided by $adapter
     *
     * @param AdapterInterface $adapter
     * @return mixed
     */
    public function sort(AdapterInterface $adapter);
}