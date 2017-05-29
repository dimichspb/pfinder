<?php
namespace Pfinder\Outputs;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\OutputInterface;

/**
 * Class JsonOutput
 *
 * Outputs the TicketCollection as JSON
 *
 * @package Pfinder\Outputs
 */
class JsonOutput implements OutputInterface
{
    /**
     * Returns JSON from TicketCollection
     *
     * @param TicketCollection $collection
     * @return string
     */
    public function process(TicketCollection $collection)
    {
        return json_encode($collection->toArray());
    }

}