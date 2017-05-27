<?php
namespace reusableclasses\mathclass;

/**
 * Class MathClass
 * MathClass is a Reusable Fluent Interface for performing input validation, math operations, and post operation formatting
 * @author Pete Wingard

    example usage using nested ternary statement

         public function testMathClass(){
            $Math = new MathClass(2312,26);
            $is_no_error = ($Math->isDivisable()) ? (                           //pre-operator
                                                        ($Math->result) ?       //math operator
                                                        $Math->div()->rnd(2)    //post-operator
                                                        : false
                                                    ) : false;
            if(!$is_no_error) {
                $Math->result = "Input error.";
            }
        return $Math;
    }
 */

class MathClass{

    /**
     * @method constructor stores input params in $this->args
     * @param $this obj
     * @return $this,$this->args|array mixed __construct()
     */
    public function __construct() {
        $this->params = func_get_args();
        $this->args=$this->params[0];
    }


    /**************** operators ********************************/


    /**
     * @method multiplication operator, use isnumeric() first
     * @param $this->args array
     * @return $this,$this->result|numeric mul()
     */
    public function mul(){
        $this->result = 1;
        foreach ($this->args as $arg) {
            $this->result *= $arg;
        }
        return $this;
    }


    /**
     * @method division operator, use isDivisable() first
     * @param $this->args array
     * @return $this,$this->result|numeric div()
     */
    public function div(){
        $this->result = $this->args[0] / $this->args[1];
        return $this;
    }


    /**
     * @method addition operator, use isnumeric() first
     * @param $this->args array
     * @return $this,$this->result|numeric add()
     */
    public function add(){
        $this->result = 0;
        foreach ($this->args as $arg) {
            $this->result += $arg;
        }
        return $this;
    }


    /**************** post-operators ********************************/


    /**
     * @method after operator, rounds input to percision after operator
     * @param int $percision decimal places
     * @param numeric $this->result
     * @return $this,$this->result|numeric rnd()
     */
    public function rnd($percision){
        $this->result = round($this->result,$percision);
        return $this;
    }


    /**
     * @method after operator, converts numeric value to currency (after operator)
     * @param int $dec decimal places
     * @param numeric $this->result convertable to currency
     * @return $this, $this->result|string currency()
     */
    public function currency($dec = 0){
        //money_format('%.2n', $number);
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        return $this->result = money_format("%.".$dec."n", $this->result);
        return $this;
    }

    /**
     * @method after operator, groups by commas (after operator)
     * @param int $dec decimal places
     * @param numeric $this->result
     * @return $this, $this->result|string grp()
     */
    public function grp($dec){
        $this->result = number_format($this->result, 2, '.', ',');
        return $this;
    }


    /**************** pre-operators ********************************/


    /**
     * @method before non-div operators, checks for numeric parameters
     * use isDivisable() in lieu of with div operator
     * @param array|$this->args
     * @return object|$this
     * @return  bool|$this, $this->result isNumeric()
     */
    public function isNumeric() {
        foreach ($this->args as $arg) {
            if(!is_numeric($arg)) {
                $this->result = false;
                return $this;
            }
        }
        $this->result = true;
        return $this;
    }


    /**
     * @method before div operator, use in lieu of isNumeric() on div operator,
     * checks for only 2 parameters & non-zero denominator
     * @param array|$this->args
     * @return $this,$this->>result|bool isDivisable()
     */
    public function isDivisable() {
        if(count($this->args)!=2) return false; //2 params
        foreach ($this->args as $arg) {         //numeric
            if(!is_numeric($arg)) {
                $this->result = false;
                return $this;
            }
        }
        if($this->args[1]==0) return false;     //non-zero denominator
        $this->result = true;
        return $this;
    }
}