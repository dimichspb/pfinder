<?php
namespace Pfinder\Interfaces;

/**
 * Interface TicketInterface
 *
 * Provides methods to construct and output the route in human readable view
 *
 * @package Pfinder\Interfaces
 */
interface TicketInterface
{
    /**
     * TicketInterface constructor.
     *
     * @param array $details
     */
    public function __construct(array $details);

    /**
     * Returns human readable view of the route
     * @return mixed
     */
    public function getRouteString();
}