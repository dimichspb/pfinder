<?php
namespace Pfinder\Base;

use Pfinder\Interfaces\AdapterInterface;
use Pfinder\Interfaces\AlgorithmInterface;
use Pfinder\Interfaces\APIInterface;
use Pfinder\Interfaces\OutputInterface;

abstract class BaseAPI implements APIInterface
{
    protected $algorithm;
    protected $result;

    public function __construct(AlgorithmInterface $algorithm, OutputInterface $result)
    {
        $this->algorithm = $algorithm;
        $this->result = $result;
    }

    public function sort(AdapterInterface $adapter)
    {
        return $this->result->process($this->algorithm->process($adapter->getCollection()));
    }
}