<?php

require_once 'inc/connection.php';

require_once "classes/Requests.php";
require_once "classes/Session.php";
require_once "classes/validation/validation.php";
require_once "classes/validation/string.php";
require_once "classes/validation/required.php";


use ToDo\Classes\Request;
use ToDo\Classes\Session;
use ToDo\Classes\Validation;


$request = new Request;
$session = new Session;
$validation = new Validation;