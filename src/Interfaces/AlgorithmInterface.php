<?php
namespace Pfinder\Interfaces;

use Pfinder\Collections\TicketCollection;

interface AlgorithmInterface
{
    public function run(TicketCollection $collection): TicketCollection;
}