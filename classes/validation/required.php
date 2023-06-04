<?php 
require_once "Validator.php";

use ToDo\Classes\Validator;

class Required implements Validator{
    public function check($key, $val)
    {
        if (empty($val)) {
            return "$key is required";
        }else{
            return false;
        }
    }
}

?>