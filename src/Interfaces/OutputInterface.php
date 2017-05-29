<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

/**
 * Interface OutputInterface
 *
 * Provides method to process the TicketCollection and supply the result
 *
 * @package Pfinder\Interfaces
 */
interface OutputInterface
{
    /**
     * Processes the output result
     *
     * @param TicketCollection $collection
     * @return mixed
     */
    public function process(TicketCollection $collection);
}