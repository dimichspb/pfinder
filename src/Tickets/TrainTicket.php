<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

/**
 * Class TrainTicket
 *
 * @package Pfinder\Tickets
 */
class TrainTicket extends BaseTicket
{
    /**
     * @var string Train number
     */
    public $number;

    /**
     * @var string Seat number
     */
    public $seat;

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getRouteString()
    {
        return
            'Take train ' . $this->number . ' ' .
            'from ' . $this->origin . ' to ' . $this->destination . '. ' .
            'Sit in seat '. $this->seat . '.';
    }
}