<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

interface AlgorithmInterface
{
    public function process(TicketCollection $collection): TicketCollection;
}