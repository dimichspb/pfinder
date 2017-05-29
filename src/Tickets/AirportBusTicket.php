<?php
namespace Pfinder\Tickets;

class AirportBusTicket extends BusTicket
{
    public function getRouteString()
    {
        return 'Take the airport bus from ' . $this->origin . ' to ' . $this->destination . '. No seat assignment.';
    }
}