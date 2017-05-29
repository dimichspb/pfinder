<?php
namespace Pfinder\Base;

use Collections\Collection;

/**
 * Class BaseCollection
 *
 * Contains basic method to manipulate Collections
 *
 * @package Pfinder\Base
 */
abstract class BaseCollection extends Collection
{
    abstract public function getClassName(): string ;

    public function __construct()
    {
        parent::__construct($this->getClassName());
    }
}