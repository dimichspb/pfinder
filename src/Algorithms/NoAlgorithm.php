<?php
namespace Pfinder\Algorithms;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

/**
 * Class NoAlgorithm
 *
 * Do not sort tickets inside TicketCollection at all. Built for developing purposes
 *
 * @package Pfinder\Algorithms
 */
class NoAlgorithm implements AlgorithmInterface
{
    /**
     * Do not sort tickets actually
     *
     * @param TicketCollection $collection
     * @return TicketCollection
     */
    public function run(TicketCollection $collection): TicketCollection
    {
        return $collection;
    }
}