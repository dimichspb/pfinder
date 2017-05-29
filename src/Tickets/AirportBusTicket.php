<?php
namespace Pfinder\Tickets;

/**
 * Class AirportBusTicket
 *
 * Extended from BusTicket to replace the getRouteString() method result
 *
 * @package Pfinder\Tickets
 */
class AirportBusTicket extends BusTicket
{
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getRouteString()
    {
        return
            'Take the airport bus ' .
            'from ' . $this->origin . ' to ' . $this->destination . '. '.
            'No seat assignment.';
    }
}