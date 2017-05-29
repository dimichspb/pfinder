<?php
namespace Pfinder\Interfaces;

use Pfinder\Collection;

interface AdapterInterface
{
    public function getCollection(): Collection;
}