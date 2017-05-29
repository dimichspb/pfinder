<?php
namespace Pfinder\Base;

use Collections\Collection;

abstract class BaseCollection extends Collection
{
    abstract public function getClassName(): string ;

    public function __construct()
    {
        parent::__construct($this->getClassName());
    }
}