<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "MathClass.php";

$mymy = new TestMathClass;

echo $mymy->testMathClassTernary()->result.PHP_EOL;


class TestMathClass{

    public $var1 = 1;
    public $var2 = 2;
    public $var3 = 3;

    public function testMathClassTernary(){

        $Math = new MathClass($this);
        $is_no_error =
                    ($Math->isNumeric()) ? (                //pre-operator
                        ($Math->result) ?                       //math operator
                            $Math->add()->grp(2)    //post-operator
                            : false
                    ) : false;
        if(!$is_no_error) {
            $Math->result = "Input error.";
        }
        return $Math;
    }

//    public function testMathClass(){
//
//        $Math = new MathClass($this->var1,$this->var2,$this->var3);
//
//        if($Math->isNumeric()){
//            $Math->mul()->grp(2)
//        }
//
//
//            ($Math->result) ?                       //math operator
//                   //post-operator
//                : false
//            ) : false;
//        if(!$is_no_error) {
//            $Math->result = "Input error.";
//        }
//        return $Math;
//    }
}


