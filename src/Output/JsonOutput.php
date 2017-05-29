<?php
namespace Pfinder\Output;

use Pfinder\Collection;
use Pfinder\Interfaces\OutputInterface;

class JsonOutput implements OutputInterface
{
    public function process(Collection $collection)
    {
        return json_encode($collection);
    }

}