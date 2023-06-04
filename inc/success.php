    <?php
    if ($session->has("success")) {?>
        <div class="alert alert-success w-50"><?php echo $session->get("success") ?></div>
    <?php 
        $session->remove("success"); }
    ?>