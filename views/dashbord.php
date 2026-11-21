<?php
    ob_start();
?>

<main>
    <h2>Welcome  <?= $user->email ?> in Dashbord</h2>
</main>

<?php 
    $title = "Dashbord";
    $content = ob_get_clean();
    require __DIR__. "/users/layer.php";
?>

