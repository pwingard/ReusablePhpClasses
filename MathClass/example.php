<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "MathClass.php";

$mymy = new TestMathClass;
echo $mymy->testMathClass()->result.PHP_EOL;


class TestMathClass{

    public $patent = 18000;
    public $legal_accounting = 6000.77;

    public function testMathClass(){

        $Math = new MathClass(2312,26);
        $is_no_error = ($Math->isDivisable()) ? (                   //pre-operator
                                                ($Math->result) ?   //math operator
                                                    $Math->div()->rnd(2) //post-operator
                                                    : false
                                            ) : false;
        if(!$is_no_error) {
            $Math->result = "Input error.";
        }
        return $Math;
    }
}


