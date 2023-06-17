<?php
if ($session->has("errors")) {
    foreach ($session->get("errors") as $error) { ?>
        <div class="alert alert-danger w-50"><?php echo $error ?></div>
    <?php }
    $session->remove("errors");
}
if ($session->has("success")) {?>
        <div class="alert alert-success w-50"><?php echo $session->get("success") ?></div>
<?php 
    $session->remove("success");
}
?>