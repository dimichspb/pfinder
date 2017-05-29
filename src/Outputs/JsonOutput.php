<?php
namespace Pfinder\Outputs;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\OutputInterface;

class JsonOutput implements OutputInterface
{
    public function process(TicketCollection $collection)
    {
        return json_encode($collection->toArray());
    }

}