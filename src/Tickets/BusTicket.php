<?php
namespace Pfinder\Tickets;

use Pfinder\Base\BaseTicket;

/**
 * Class BusTicket
 *
 * @package Pfinder\Tickets
 */
class BusTicket extends BaseTicket
{
    /**
     * @var string Bus number
     */
    public $number;

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getRouteString()
    {
        return
            'Take bus ' . $this->number . ' ' .
            'from ' . $this->origin . ' to ' . $this->destination . '. ' .
            'No seat assignment.';
    }
}