<?php
namespace Pfinder\Base;

use Pfinder\Interfaces\AdapterInterface;
use Pfinder\Interfaces\AlgorithmInterface;
use Pfinder\Interfaces\APIInterface;
use Pfinder\Interfaces\OutputInterface;

/**
 * Class BaseAPI
 *
 * Contains common constructor and sort methods
 *
 * @package Pfinder\Base
 */
abstract class BaseAPI implements APIInterface
{
    /**
     * @var AlgorithmInterface
     */
    protected $algorithm;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * BaseAPI constructor.
     *
     * @param AlgorithmInterface $algorithm
     * @param OutputInterface $output
     */
    public function __construct(AlgorithmInterface $algorithm, OutputInterface $output)
    {
        $this->algorithm = $algorithm;
        $this->output = $output;
    }

    /**
     * The endpoint of API to arrange sorting of objects provided by Adapter, using Algorithm and process with Output
     *
     * @param AdapterInterface $adapter
     * @return mixed
     */
    public function sort(AdapterInterface $adapter)
    {
        return $this->output->process($this->algorithm->run($adapter->getCollection()));
    }
}