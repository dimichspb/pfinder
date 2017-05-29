<?php
namespace Pfinder\Tests;

use Pfinder\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * @var App
     */
    private $app;

    protected function setUp()
    {
        $this->app = new App();
    }

    protected function tearDown()
    {
        $this->app = null;
    }

    /**
     * @dataProvider casesProvider
     *
     * @param $testCase
     * @param $algorithmClass
     * @param $outputClass
     * @param $expectedOutput
     */
    public function testRun($testCase, $algorithmClass, $outputClass, $expectedOutput)
    {
        $output = file_get_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'sources' . DIRECTORY_SEPARATOR . $expectedOutput);

        $this->expectOutputString($output);

        $this->app->run($testCase, $algorithmClass, $outputClass);
    }

    public function casesProvider()
    {
        $result = [];
        foreach ($this->inputProvider() as $input) {
            foreach ($this->algorithmClassProvider() as $algorithmClass) {
                foreach ($this->outputClassProvider() as $outputClass => $outputExpected) {
                    $result[] = [
                        $input, $algorithmClass, $outputClass, $outputExpected,
                    ];
                }
            }
        }
        return $result;
    }

    public function inputProvider()
    {
        return [
            'test1.json',
            'test2.json',
            'test3.json',
            'test4.json',
            'test5.json',
            'test6.json',
            'test7.json',
            'test8.json',
        ];
    }

    public function algorithmClassProvider()
    {
        return [
            //'\Pfinder\Algorithms\NoAlgorithm',
            '\Pfinder\Algorithms\RecursiveAlgorithm',
            //'\Pfinder\Algorithms\CustomAlgorithm',
        ];
    }

    public function outputClassProvider()
    {
        return [
            '\Pfinder\Outputs\JsonOutput' => 'success.json',
            '\Pfinder\Outputs\StringOutput' => 'success.txt',
        ];
    }
}
