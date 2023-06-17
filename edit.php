<?php
require_once 'inc/header.php';
require_once "App.php";

?>


<?php

if ($request->has($request->get("id"))) {

    $id = $request->get("id");
    // check if data exist
    $stm = $conn->prepare("SELECT `title` FROM `to_do` WHERE id =:id");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $output = $stm->execute(); 
}else{
    $request->header('index.php');
}
?>

<body class="container w-50 mt-5">

    <?php if ($stm->rowCount() > 0) :?>

    <?php $todo = $stm->fetch(PDO::FETCH_ASSOC); ?>
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?php echo $todo['title'] ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
    <?php else: echo "no datafound"; endif;?>

</body>
</html>