<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

class BusTicket extends BaseTicket
{
    public $number;

    public function getRouteString()
    {
        return 'Take bus ' . $this->number . ' from ' . $this->origin . ' to ' . $this->destination . '. No seat assignment.';
    }
}