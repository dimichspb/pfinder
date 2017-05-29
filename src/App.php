<?php
namespace Pfinder;

use Pfinder\Adapters\JsonAdapter;
use Pfinder\Algorithms\NoAlgorithm;
use Pfinder\Output\JsonOutput;

class App
{
    public function run()
    {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'sources';

        $adapter = new JsonAdapter($path . DIRECTORY_SEPARATOR . 'test1.json');

        $algorithm = new NoAlgorithm();
        $output = new JsonOutput();

        $api = new API($algorithm, $output);

        echo $api->sort($adapter);
    }
}