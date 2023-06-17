<?php
require_once "../App.php";

if ($request->has($request->get("id"))) {

$id = $request->get("id");
        
        // check if data exist
        $stmt = $conn->prepare("SELECT * FROM `to_do` WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $output = $stmt->execute(); 

        if ($stmt->rowCount() == 1) {

        $stmt = $conn->prepare("DELETE FROM `to_do` WHERE id =:id ");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $output = $stmt->execute();

        if ($output) {
            $session->set("success"," data deleted succesfully");
            $request->header("../index.php");
            
        }else{
        $session->set("errors",["failed"]);
        $request->header("../index.php");
    }
    }else{
        $session->set("errors",$errors);
        $request->header("../index.php");
    }

}



?>
