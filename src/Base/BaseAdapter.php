<?php
namespace Pfinder\Base;

use Pfinder\Interfaces\AdapterInterface;

/**
 * Class BaseAdapter
 *
 * Contains common constructor for adapters
 *
 * @package Pfinder\Base
 */
abstract class BaseAdapter implements AdapterInterface
{
    /**
     * @var mixed input source
     */
    protected $source;

    /**
     * BaseAdapter constructor.
     *
     * @param $source
     */
    public function __construct($source)
    {
        $this->source = $source;
    }
}