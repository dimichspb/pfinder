<?php
namespace Pfinder\Adapters;

use Pfinder\Base\BaseAdapter;

class JsonAdapter extends BaseAdapter
{
    public function getCollection(): Collection
    {
        $ticketDetailsArray = json_decode($this->source, true);

        return TicketFactory::createTicketCollection($ticketDetailsArray);
    }
}