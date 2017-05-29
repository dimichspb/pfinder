<?php
namespace Pfinder\Collections;

use Pfinder\Base\BaseCollection;

class TicketCollection extends BaseCollection
{
    public function getClassName(): string
    {
        return '\Pfinder\Base\BaseTicket';
    }

    public function insertBefore($index, $item)
    {
        var_dump('inserting before ' . $index);
        if ($index === -1) {
            if (count($this) === 0) {
                return parent::add($item);
            }
            return parent::insert(0, $item);
        }

        return parent::insert($index, $item);
    }

    public function insertAfter($index, $item)
    {
        var_dump('inserting after ' . $index);
        if ($index === -1 || $index >= (count($this) - 1)) {
            return parent::add($item);
        }

        return parent::insert($index + 1, $item);
    }

    public function insertAfterBefore($item, callable $conditionAfter, callable $conditionBefore)
    {
        $index = $this->findIndex($conditionBefore);

        if ($index === -1) {
            $index = $this->findLastIndex($conditionAfter);
            return $this->insertAfter($index, $item);
        }

        return $this->insertBefore($index, $item);
    }

}