<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

/**
 * Interface AdapterInterface
 *
 * Provides basic method to get TicketCollection from the source
 *
 * @package Pfinder\Interfaces
 */
interface AdapterInterface
{
    /**
     * Builds TicketCollection from the source
     *
     * @return TicketCollection
     */
    public function getCollection(): TicketCollection;
}