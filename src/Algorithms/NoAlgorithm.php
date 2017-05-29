<?php
namespace Pfinder\Algorithms;

use Pfinder\Collection;
use Pfinder\Interfaces\AlgorithmInterface;

class NoAlgorithm implements AlgorithmInterface
{

    public function process(Collection $collection): Collection
    {
        return $collection;
    }
}