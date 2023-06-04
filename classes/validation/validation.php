<?php 
namespace ToDo\Classes;
class Validation {
    private $errors_arr = [];
    public function validator($key,$value,$rules){
        foreach ($rules as $rule) {
            $object = new $rule;
            $error =  $object->check($key,$value);

           if ($error != false) {
                $this->errors_arr[] = $error;
           }
        }
    }
    public function getErrors()
    {
        return $this->errors_arr;
    }
}

?>