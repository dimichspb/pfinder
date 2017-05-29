<?php
namespace Pfinder;

use Pfinder\Adapters\JsonAdapter;
use Pfinder\Algorithms\NoAlgorithm;
use Pfinder\Output\JsonOutput;

class App
{
    public function run()
    {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . '/Sources';

        $algorithm = new NoAlgorithm();
        $result = new JsonOutput();
        $api = new API($algorithm, $result);

        $adapter = new JsonAdapter($path . DIRECTORY_SEPARATOR . 'test1.json');

        echo $api->sort($adapter);
    }
}