<?php
namespace Pfinder\Repositories;

use Pfinder\Exceptions\InvalidTicketNameException;

/**
 * Class TicketRepository
 *
 * Contains the mapping between ticket names and ticket classes
 *
 * @package Pfinder\Repositories
 */
class TicketRepository
{
    const BUS_TICKET_NAME = 'Bus';
    const BUS_TICKET_CLASS = '\Pfinder\Tickets\BusTicket';
    const AIRPORTBUS_TICKET_NAME = 'AirportBus';
    const AIRPORTBUS_TICKET_CLASS = '\Pfinder\Tickets\AirportBusTicket';
    const TRAIN_TICKET_NAME = 'Train';
    const TRAIN_TICKET_CLASS = '\Pfinder\Tickets\TrainTicket';
    const FLIGHT_TICKET_NAME = 'Flight';
    const FLIGHT_TICKET_CLASS = '\Pfinder\Tickets\FlightTicket';

    /**
     * Mapping ['name' => 'class'] array
     *
     * @return array
     */
    public static function mapping()
    {
        return [
            self::BUS_TICKET_NAME => self::BUS_TICKET_CLASS,
            self::AIRPORTBUS_TICKET_NAME => self::AIRPORTBUS_TICKET_CLASS,
            self::TRAIN_TICKET_NAME => self::TRAIN_TICKET_CLASS,
            self::FLIGHT_TICKET_NAME => self::FLIGHT_TICKET_CLASS,
        ];
    }

    /**
     * Return the name of the class by the provided ticket's name
     *
     * @param string $name
     * @return string
     */
    public static function getClass(string $name): string
    {
        if (!isset(self::mapping()[$name])) {
            throw new InvalidTicketNameException('Ticket with name ' . $name . ' could not be found in TicketsRepository.');
        }
        return self::mapping()[$name];
    }
}