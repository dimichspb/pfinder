<?php
namespace Pfinder;

use Pfinder\Adapters\JsonAdapter;
use Pfinder\Algorithms\CustomAlgorithm;
use Pfinder\Algorithms\NoAlgorithm;
use Pfinder\Algorithms\RecursiveAlgorithm;
use Pfinder\Outputs\JsonOutput;
use Pfinder\Outputs\StringOutput;

class App
{
    public function run($testCase, $algorithmClass = '\Pfinder\Algorithms\RecursiveAlgorithm', $outputClass = '\Pfinder\Outputs\StringOutput')
    {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'sources';

        $adapter = new JsonAdapter($path . DIRECTORY_SEPARATOR . $testCase);

        $algorithm = new $algorithmClass;
        $output = new $outputClass;

        $api = new API($algorithm, $output);

        echo $api->sort($adapter);
    }
}