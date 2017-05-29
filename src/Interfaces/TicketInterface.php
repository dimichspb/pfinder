<?php
namespace Pfinder\Interfaces;

interface TicketInterface
{
    public function __construct(array $details);

    public function getRouteString();
}