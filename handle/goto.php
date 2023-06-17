<?php
require_once "../App.php";

if ($request->has($request->get("id")) && $request->has($request->get("name"))) {

    $id = $request->get("id");
    $name = $request->get('name');

    // check if data exist
    $stmt = $conn->prepare("SELECT * FROM `to_do` WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $output = $stmt->execute();


    if ($stmt->rowCount() == 1) {

        if ($name == 'doing') {
            $stmt = $conn->prepare("UPDATE `to_do` SET `status` = 'doing' WHERE `to_do`.`id` =:id ");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $output = $stmt->execute();

            // redirect with message
            $session->set('success', 'moved to doing list');
            $request->header('../index.php');
            exit;

        } elseif ($name == 'done') {
            $stmt = $conn->prepare("UPDATE `to_do` SET `status` = 'done' WHERE `to_do`.`id` =:id ");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $output = $stmt->execute();
            // redirect with message
            $session->set('success', 'moved to done list');
            $request->header('../index.php');
            exit;
        }
    }else{
        $session->set('errors',['not found']);
        $request->header('../index.php');
        exit;
    }


} else {
    $request->header('../index.php');
    exit;
}
