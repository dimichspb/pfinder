<?php
namespace Pfinder\Collections;

use Pfinder\Base\BaseCollection;

class TicketCollection extends BaseCollection
{
    public function __construct()
    {
        parent::__construct('\PFinder\Base\BaseTicket');
    }
}