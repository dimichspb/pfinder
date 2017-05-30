<?php
namespace Pfinder\Algorithms;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

/**
 * Class RecursiveAlgorithm
 *
 * Sorts tickets inside TicketCollection using recursive function call
 *
 * @package Pfinder\Algorithms
 */
class RecursiveAlgorithm implements AlgorithmInterface
{
    public function run(TicketCollection $collection): TicketCollection
    {
        $largestCollection = new TicketCollection();

        foreach ($collection as $ticket) {
            $chainCollection = new TicketCollection();
            $chainCollection = $chainCollection->add($ticket);

            /*
             * TicketCollection::buildChain is recursive function which uses closure to find next item of a chain
             */
            $chainCollection = $chainCollection->merge($collection->buildChain($ticket, function ($item, $ticket) {
                return $item->origin === $ticket->destination;
            }));

            if (count($chainCollection) > count($largestCollection)) {
                $largestCollection = $chainCollection;
            }
        }

        return $largestCollection;
    }

}