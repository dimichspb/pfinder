<?php
namespace Pfinder\Interfaces;

use Pfinder\Collection;

interface OutputInterface
{
    public function process(Collection $collection);
}