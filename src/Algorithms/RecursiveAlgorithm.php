<?php
namespace Pfinder\Algorithms;

use Pfinder\Base\BaseTicket;
use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

class RecursiveAlgorithm implements AlgorithmInterface
{
    public function run(TicketCollection $collection): TicketCollection
    {
        $newCollection = clone $collection;

        foreach ($collection as $ticket) {

            $newCollection = $newCollection->sort(function (BaseTicket $item1, BaseTicket $item2) {
                if ($item1->origin === $item2->destination) {
                    return 1;
                }
                if ($item1->destination === $item2->origin) {
                    return -1;
                }

                return 1;
            });
        }

        return $newCollection;
    }
}