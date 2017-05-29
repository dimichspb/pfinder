<?php
namespace Pfinder\Collections;

use Pfinder\Base\BaseCollection;

class TicketCollection extends BaseCollection
{
    public function getClassName(): string
    {
        return '\Pfinder\Base\BaseTicket';
    }
}