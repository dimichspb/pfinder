<?php
namespace Pfinder\Base;

use Pfinder\Exceptions\TicketDetailsParsingException;
use Pfinder\Interfaces\TicketInterface;

/**
 * Class BaseTicket
 *
 * Contains common constructor of tickets
 *
 * @package Pfinder\Base
 */
abstract class BaseTicket implements TicketInterface
{
    /**
     * @var string Name of ticket's type. Related to ticket's class via TicketRepository
     */
    public $name;

    /**
     * @var string Origin of the ticket
     */
    public $origin;

    /**
     * @var string Destination of the ticket
     */
    public $destination;

    /**
     * BaseTicket constructor.
     *
     * @param array $details
     */
    public function __construct(array $details)
    {
        $this->load($details);
    }

    /**
     * Loads the object attributes with the details
     *
     * @param array $details
     * @throws TicketDetailsParsingException
     */
    protected function load(array $details)
    {
        foreach ($details as $name => $value) {
            if (is_array($value)) {
                throw new TicketDetailsParsingException('No nested attributes supported');
            }
            if (!property_exists($this, $name)) {
                throw new TicketDetailsParsingException('Attribute "' . $name . '" does not exists in ' . get_class($this));
            }
            $this->$name = $value;
        }
    }
}