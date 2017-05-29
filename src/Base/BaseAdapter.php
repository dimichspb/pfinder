<?php
namespace Pfinder\Base;

use Pfinder\Interfaces\AdapterInterface;

abstract class BaseAdapter implements AdapterInterface
{
    protected $source;

    public function __construct($source)
    {
        $this->source = $source;
    }
}