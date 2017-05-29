<?php
namespace Pfinder\Repositories;

use Pfinder\Exceptions\InvalidTicketNameException;

class TicketRepository
{
    const BUS_TICKET_NAME = 'Bus';
    const BUS_TICKET_CLASS = '\PFinder\Tickets\BusTicket';
    const TRAIN_TICKET_NAME = 'Train';
    const TRAIN_TICKET_CLASS = '\PFinder\Tickets\TrainTicket';
    const FLIGHT_TICKET_NAME = 'Flight';
    const FLIGHT_TICKET_CLASS = '\PFinder\Tickets\FlightTicket';

    public static function mapping()
    {
        return [
            self::BUS_TICKET_NAME => self::BUS_TICKET_CLASS,
            self::TRAIN_TICKET_NAME => self::TRAIN_TICKET_CLASS,
            self::FLIGHT_TICKET_NAME => self::FLIGHT_TICKET_CLASS,
        ];
    }

    public static function getClass(string $name): string
    {
        if (!isset(self::mapping()[$name])) {
            throw new InvalidTicketNameException('Ticket with name ' . $name . ' could not be found in TicketsRepository.');
        }
        return self::mapping()[$name];
    }
}