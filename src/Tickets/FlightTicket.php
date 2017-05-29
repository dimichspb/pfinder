<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

/**
 * Class FlightTicket
 *
 * @package Pfinder\Tickets
 */
class FlightTicket extends BaseTicket
{
    /**
     * @var string Flight number
     */
    public $number;

    /**
     * @var string Gate number
     */
    public $gate;

    /**
     * @var string Seat number
     */
    public $seat;

    /**
     * @var string Baggage counter desk number
     */
    public $counter;

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getRouteString()
    {
        $counterString = empty($this->counter)?
            'Baggage will we automatically transferred from your last leg':
            'Baggage drop at ticket counter ' . $this->counter;

        return
            'From ' . $this->origin . ', ' .
            'take flight ' . $this->number . ' to ' . $this->destination . '. ' .
            'Gate ' . $this->gate . ', seat '. $this->seat . '. ' .
            $counterString . '.';
    }
}