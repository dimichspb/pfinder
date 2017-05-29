<?php
namespace Pfinder\Base;

use Pfinder\Interfaces\AdapterInterface;
use Pfinder\Interfaces\AlgorithmInterface;
use Pfinder\Interfaces\APIInterface;
use Pfinder\Interfaces\OutputInterface;

abstract class BaseAPI implements APIInterface
{
    protected $algorithm;
    protected $output;

    public function __construct(AlgorithmInterface $algorithm, OutputInterface $output)
    {
        $this->algorithm = $algorithm;
        $this->output = $output;
    }

    public function sort(AdapterInterface $adapter)
    {
        return $this->output->process($this->algorithm->run($adapter->getCollection()));
    }
}