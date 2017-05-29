<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

class FlightTicket extends BaseTicket
{
    public $number;
    public $gate;
    public $seat;
    public $counter;

    public function getRouteString()
    {
        $counterString = empty($this->counter)?
            'Baggage will we automatically transferred from your last leg':
            'Baggage drop at ticket counter 344';

        return 'From ' . $this->origin . ', take flight ' . $this->number . ' to ' . $this->destination . '. Gate ' . $this->gate . ', seat '. $this->seat . '. ' . $counterString . '.';
    }
}