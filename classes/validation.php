<?php
class Validate
{
    private $_passed = false,
        $_errors = array(),
        $_db  = null;

    public function __construct() #gebruikt wanneer validate wordt gebruikt
    {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) { # checkt de benodigdheden 
            foreach ($rules as $rule => $rule_value) {

                $value = $source[$item];
                $item = escape($item);

                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is nodig");
                } 
                else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} moet minimaal {$rule_value} characters hebben.");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} mag maximaal {$rule_value} characters hebben.");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} moet gelijk zijn aan {$item}");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            // if ($check->count()) { #############
                            //     $this->addError("{$item} bestaat al.");
                            // }
                            break;
                    }
                }
            }
        }

        if (empty($this->_errors)) { //empty checken
            $this->_passed = true;
        }

        return $this;
    }

    public function addError($error) // zal een error toeveoegen aan error array
    {
        $this->_errors[] = $error;
    }

    public function errors() //laat alle errors zien
    {
        return $this->_errors;
    }

    public function passed() // voor als het juist is
    {
        return $this->_passed;
    }
}
