<?php
namespace reusableclasses\mathclass;

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


}


