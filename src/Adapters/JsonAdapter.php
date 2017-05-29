<?php
namespace Pfinder\Adapters;

use Pfinder\Base\BaseAdapter;
use Pfinder\Collections\TicketCollection;
use Pfinder\Exceptions\FileNotFoundException;
use Pfinder\Factories\TicketFactory;

/**
 * Class JsonAdapter
 *
 * Builds TicketCollection from provided JSON file
 *
 * @package Pfinder\Adapters
 */
class JsonAdapter extends BaseAdapter
{
    /**
     * @inheritdoc
     *
     * @return TicketCollection
     * @throws FileNotFoundException
     */
    public function getCollection(): TicketCollection
    {
        if (!file_exists($this->source)) {
            throw new FileNotFoundException('Can not find file ' . $this->source);
        }
        $ticketDetailsArray = json_decode(file_get_contents($this->source), true);

        return TicketFactory::createTicketCollection($ticketDetailsArray);
    }
}