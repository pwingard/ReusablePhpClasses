<?php
namespace reusableclasses\mathclass;

require_once "MathClass.php";

$mymy = new TestMathClass;

echo $mymy->testMathClassTernary()->result.PHP_EOL;
echo $mymy->testMathClass()->result.PHP_EOL;


class TestMathClass{

    public $var1 = 8;
    public $var2 = 2;
    public $var3 = 3;

    public function testMathClassTernary(){
        $Math = new MathClass($this);
        ($Math->isNumeric()) ? (($Math->result) ? $Math->add()->grp(2) : $Math->result = "Input error." ) : $Math->result = "Input error.";
        return $Math;
    }


    public function testMathClass(){

        $Math = new MathClass($this);

        if($Math->isNumeric()){                 //pre-operator
            $Math->mul()                        //math operator
                ->grp(2);                   //post-operator
        } else{
            $Math->result = "Input error.";
        }
        return $Math;
    }
}