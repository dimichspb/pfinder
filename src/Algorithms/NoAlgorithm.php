<?php
namespace Pfinder\Algorithms;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

class NoAlgorithm implements AlgorithmInterface
{

    public function run(TicketCollection $collection): TicketCollection
    {
        return $collection;
    }
}