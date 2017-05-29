<?php
namespace Pfinder\Interfaces;

use Pfinder\Collection;

interface AlgorithmInterface
{
    public function process(Collection $collection): Collection;
}