<?php
namespace Pfinder\Collections;

use Collections\Collection;
use Pfinder\Base\BaseCollection;
use Pfinder\Interfaces\TicketInterface;

/**
 * Class TicketCollection
 *
 * Extends BaseCollection with some extra methods
 *
 * @package Pfinder\Collections
 */
class TicketCollection extends BaseCollection
{
    /**
     * All objects inside the TicketCollection must be extended from BaseTicket
     *
     * @return string The name of the class the Collection contains
     */
    public function getClassName(): string
    {
        return '\Pfinder\Base\BaseTicket';
    }

    /**
     * Inserts $item before $index
     *
     * @param $index
     * @param $item
     * @return BaseCollection
     */
    public function insertBefore($index, $item)
    {
        if ($index === -1) {
            if (count($this) === 0) {
                return parent::add($item);
            }
            return parent::insert(0, $item);
        }

        return parent::insert($index, $item);
    }

    /**
     * Inserts $item after $index
     *
     * @param $index
     * @param $item
     * @return BaseCollection
     */
    public function insertAfter($index, $item)
    {
        if ($index === -1 || $index >= (count($this) - 1)) {
            return parent::add($item);
        }

        return parent::insert($index + 1, $item);
    }

    /**
     * Decides where to insert the object before or after depending on callables provided
     *
     * @param $item
     * @param callable $conditionAfter
     * @param callable $conditionBefore
     * @return BaseCollection
     */
    public function insertAfterBefore($item, callable $conditionAfter, callable $conditionBefore)
    {
        $index = $this->findIndex($conditionBefore);

        if ($index === -1) {
            $index = $this->findLastIndex($conditionAfter);
            return $this->insertAfter($index, $item);
        }

        return $this->insertBefore($index, $item);
    }

    /**
     * Recursive function to build a chain of tickets using self call with closure which determines next item condition as argument
     *
     * @param $ticket
     * @param callable $condition
     * @return TicketCollection
     */
    public function buildChain($ticket, callable $condition)
    {
        $newCollection = new TicketCollection();

        foreach ($this as $item) {
            if ($item === $ticket) {
                continue;
            }
            if ($condition($item, $ticket)) {
                /** @var TicketCollection $newCollection */
                $newCollection = $newCollection->add($item);
                $newCollection = $newCollection->merge($this->buildChain($item, $condition));
                return $newCollection;
            }
        }

        return $newCollection;
    }
}