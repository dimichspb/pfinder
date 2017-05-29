<?php
namespace Pfinder\Factories;

use Pfinder\Base\BaseTicket;
use Pfinder\Collections\TicketCollection;
use Pfinder\Exceptions\TicketDetailsParsingException;
use Pfinder\Repositories\TicketRepository;

class TicketFactory
{
    public static function createTicket(array $ticketDetails): BaseTicket
    {
        if (!isset($ticketDetails['name'])) {
            throw new TicketDetailsParsingException('Ticket details must contain "name" attribute');
        }
        $ticketClass = TicketRepository::getClass($ticketDetails['name']);
        return new $ticketClass($ticketDetails);
    }

    public static function createTicketCollection(array $ticketDetailsArray): TicketCollection
    {
        $collection = new TicketCollection();

        foreach ($ticketDetailsArray as $ticketDetails)
        {
            if (!is_array($ticketDetails)) {
                throw new TicketDetailsParsingException('Ticket details must contain array of ticket details');
            }
            $collection = $collection->add(self::createTicket($ticketDetails));
        }

        return $collection;
    }
}