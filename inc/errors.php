    <?php 
    if ($session->has("errors")) {
    foreach ($session->get("errors") as $error) {?>
    <div class="alert alert-danger w-50"><?php echo $error?></div>
    <?php }
    $session->remove("errors");
    }
    ?>