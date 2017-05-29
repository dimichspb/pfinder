<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

class TrainTicket extends BaseTicket
{
    public $number;
    public $seat;


    public function getRouteString()
    {
        return 'Take train ' . $this->number . ' from ' . $this->origin . ' to ' . $this->destination . '. Sit in seat '. $this->seat . '.';
    }
}