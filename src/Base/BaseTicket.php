<?php
namespace Pfinder\Base;

use Pfinder\Exceptions\TicketDetailsParsingException;

abstract class BaseTicket
{
    public $name;
    public $origin;
    public $destination;

    public function __construct(array $details)
    {
        $this->load($details);
    }

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