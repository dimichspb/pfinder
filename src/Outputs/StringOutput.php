<?php
namespace Pfinder\Outputs;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\OutputInterface;

class StringOutput implements OutputInterface
{
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
