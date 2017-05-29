<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

interface AdapterInterface
{
    public function getCollection(): TicketCollection;
}