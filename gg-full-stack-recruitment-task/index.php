<?php
require 'users/users.php';

$users = getUsers();

include 'partials/header.php';
?>

<main>
    <?php require_once './partials/main.php'; ?>
</main>

<?php include 'partials/footer.php' ?>