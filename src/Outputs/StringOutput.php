<?php
namespace Pfinder\Outputs;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\OutputInterface;

/**
 * Class StringOutput
 *
 * Outputs TicketCollection in String view
 *
 * @package Pfinder\Outputs
 */
class StringOutput implements OutputInterface
{
    /**
     * Returns String output from TicketCollection
     *
     * @param TicketCollection $collection
     * @return string
     */
    public function process(TicketCollection $collection)
    {
        $result = '';

        $index = 1;
        foreach ($collection as $ticket) {
            $result .= $index . '. ' . $ticket->getRouteString() ."\r\n";
            $index++;
        }

        $result .= $index . '. You have arrived at your final destination.';

        return $result;
    }

}
