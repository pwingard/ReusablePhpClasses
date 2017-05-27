<?php
namespace php\ReusableClasses\MathClass;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "MathClass.php";

$mymy = new TestMathClass;

//use MathClass inside a class
echo $mymy->testMathClass()->result.PHP_EOL;

// or outside a class
$Math = new MathClass();
$Math->setInput([12.445678, 15,17])->isNumeric()->mul()->grp(2);
echo $Math->result.PHP_EOL;


class TestMathClass{

    //params can be passed from inside another class
    public $var1 = 8;
    public $var2 = 2;
    public $var3 = 3;

    /**
     * if/then example test for math class
     * @param numeric $var1, $var2, $var3
     * @return MathClass testMathClass()
     */
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