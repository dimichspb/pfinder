<?php
namespace Pfinder\Algorithms;

use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

class CustomAlgorithm implements AlgorithmInterface
{
    public function run(TicketCollection $collection): TicketCollection
    {
        $newCollection = new TicketCollection();

        foreach ($collection as $ticket) {

            var_dump($ticket->name);

            $newCollection = $newCollection->insertAfterBefore($ticket, function ($item) use ($ticket) {
                return $item->destination === $ticket->origin;
            }, function ($item) use ($ticket) {
                return $item->origin === $ticket->destination;
            });

            var_dump($newCollection);
        }

        return $newCollection;
    }
}