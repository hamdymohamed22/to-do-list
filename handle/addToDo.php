<?php

require_once "../App.php";

if ($request->has($request->post("submit"))) {
    
    $title = $request->cleen($request->post("title"));

    $validation->validator("title", $title, ["Required", "Str"]);

    $errors =  $validation->getErrors();

    // insert 
    if (empty($errors)) {
        $stm = $conn->prepare("INSERT INTO to_do(`title` ) VALUES (:title)");
        $stm->bindParam(":title", $title, PDO::PARAM_STR);
        $output = $stm->execute();
        if ($output) {
            $session->set("success", "inserted succesfully");
            $request->header("../index.php");
        }else{
            $session->set("errors", ["faild to insert"]);
            $request->header("../index.php");
        }
    } else {
        $session->set("errors", $errors);
        $request->header("../index.php");
    }

}else{
    $request->header("../index.php");
    exit;
}
























