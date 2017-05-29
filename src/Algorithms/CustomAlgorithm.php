<?php
namespace Pfinder\Algorithms;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

/**
 * Class CustomAlgorithm
 *
 * Sorts tickets in TicketCollection using custom algorithm
 *
 * @package Pfinder\Algorithms
 */
class CustomAlgorithm implements AlgorithmInterface
{
    /**
     * @inheritdoc
     *
     * @param TicketCollection $collection
     * @return TicketCollection
     */
    public function run(TicketCollection $collection): TicketCollection
    {
        $newCollection = new TicketCollection();

        foreach ($collection as $ticket) {

            $newCollection = $newCollection->insertAfterBefore($ticket, function ($item) use ($ticket) {
                return $item->destination === $ticket->origin;
            }, function ($item) use ($ticket) {
                return $item->origin === $ticket->destination;
            });

        }

        return $newCollection;
    }
}