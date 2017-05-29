<?php
namespace Pfinder;

use Pfinder\Adapters\JsonAdapter;
use Pfinder\Algorithms\CustomAlgorithm;
use Pfinder\Algorithms\NoAlgorithm;
use Pfinder\Algorithms\RecursiveAlgorithm;
use Pfinder\Outputs\JsonOutput;
use Pfinder\Outputs\StringOutput;

/**
 * Class App
 *
 * Contains example of using the package
 *
 * @package Pfinder
 */
class App
{
    /**
     * Uses API to sort the input with specified $algorithmClass and $outputClass
     * Parameters are used in tests to provide the common endpoint for all test cases.
     *
     * @param $testCase
     * @param string $algorithmClass
     * @param string $outputClass
     */
    public function run($testCase, $algorithmClass = '\Pfinder\Algorithms\RecursiveAlgorithm', $outputClass = '\Pfinder\Outputs\StringOutput')
    {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'sources'; // path to all test cases

        $adapter = new JsonAdapter($path . DIRECTORY_SEPARATOR . $testCase); // Json input adapter loads test case file specified in $testCase

        $algorithm = new $algorithmClass; // Creates sorting algorithm based on provided $algorithmClass
        $output = new $outputClass; // Creates output processor based on provided $outputClass

        $api = new API($algorithm, $output); // Creates API with $algorithm and $output

        echo $api->sort($adapter); // Sorts input and prints the result
    }
}