<?php

try {
    $conn = new PDO("mysql:host=localhost;port=3306;dbname=to_do_list", "root", "");
} catch (Exception $error) {
    echo "connection failed ".$error->getMessage();
}
