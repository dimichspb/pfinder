<?php
namespace Pfinder\Interfaces;

interface APIInterface
{
    public function __construct(AlgorithmInterface $algorithm);

    public function sort(AdapterInterface $adapter);
}