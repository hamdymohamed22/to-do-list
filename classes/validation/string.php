<?php 
require_once "Validator.php";

use ToDo\Classes\Validator;

class Str implements Validator{
    public function check($key, $val)
    {
        if (is_numeric($val)) {
            return "$key must be string";
        }else{
            return false;
        }
    }
}

?>