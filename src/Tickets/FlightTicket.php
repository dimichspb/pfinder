<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

class FlightTicket extends BaseTicket
{
    public $number;
    public $gate;
    public $seat;
    public $counter;
}