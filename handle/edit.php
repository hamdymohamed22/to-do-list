<?php
require_once "../App.php";

if ($request->has($request->get("id"))) {

$id = $request->get("id");

if ($request->has($request->post("submit"))) {
    $title = $request->cleen($request->post("title"));
    $validation->validator("title",$title,["Required","Str"]);
    $errors =  $validation->getErrors();

        if (empty($errors)) {
                // check if data exist
        $stm = $conn->prepare("SELECT * FROM `to_do` WHERE id =:id");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $output = $stm->execute(); 

        if ($stm->rowCount() == 1) {
        $stm = $conn->prepare("UPDATE `to_do` SET `title`=:title WHERE id = $id");
        $stm->bindParam(":title", $title, PDO::PARAM_STR);
        $output = $stm->execute();
        if ($output) {
            $session->set("success"," data updated succesfully");
            $request->header("../edit.php");
        }
    }
        
    }else{
        $session->set("errors",$errors);
        $request->header("../index.php");
    }
}

}


?>
