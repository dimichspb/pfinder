<?php
namespace Pfinder\Algorithms;

use Pfinder\Base\BaseTicket;
use Pfinder\Collections\TicketCollection;
use Pfinder\Interfaces\AlgorithmInterface;

/**
 * Class UsortAlgorithm
 *
 * Sorts tickets inside TicketCollection using usort function of PHP
 *
 * @package Pfinder\Algorithms
 */
class UsortAlgorithm implements AlgorithmInterface
{
    /**
     * @inheritdoc
     *
     * @param TicketCollection $collection
     * @return TicketCollection
     */
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