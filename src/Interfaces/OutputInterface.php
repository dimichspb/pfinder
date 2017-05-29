<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

interface OutputInterface
{
    public function process(TicketCollection $collection);
}