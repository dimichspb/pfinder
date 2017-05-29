<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

/**
 * Interface AlgorithmInterface
 *
 * Provides the method to sort the object inside the TicketCollection using suitable algorithm
 *
 * @package Pfinder\Interfaces
 */
interface AlgorithmInterface
{
    /**
     * Sorts objects in TicketCollection
     *
     * @param TicketCollection $collection
     * @return TicketCollection
     */
    public function run(TicketCollection $collection): TicketCollection;
}