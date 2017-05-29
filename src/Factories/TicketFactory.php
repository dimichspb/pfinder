<?php
namespace Pfinder\Factories;

use Pfinder\Base\BaseTicket;
use Pfinder\Collections\TicketCollection;
use Pfinder\Exceptions\TicketDetailsParsingException;
use Pfinder\Repositories\TicketRepository;

/**
 * Class TicketFactory
 *
 * Creates Ticket and TicketCollection based on provided details
 *
 * @package Pfinder\Factories
 */
class TicketFactory
{
    /**
     * Creates Ticket of particular class with attributes provided in $ticketDetails.
     * The class of the ticket provided by TicketRepository using parameter $ticketDetails['name']
     *
     * @param array $ticketDetails
     * @return BaseTicket
     * @throws TicketDetailsParsingException
     */
    public static function createTicket(array $ticketDetails): BaseTicket
    {
        if (!isset($ticketDetails['name'])) {
            throw new TicketDetailsParsingException('Ticket details must contain "name" attribute');
        }
        $ticketClass = TicketRepository::getClass($ticketDetails['name']);
        return new $ticketClass($ticketDetails);
    }

    /**
     * Creates TicketCollection based on provided array of ticket details.
     *
     * @param array $ticketDetailsArray
     * @return TicketCollection
     * @throws TicketDetailsParsingException
     */
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