<?php
include 'partials/header.php';
require 'users/users.php';


$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'address' => '',
    'phone' => '',
    'company' => '',
];

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'address' => '',
    'phone' => '',
    'company' => '',
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = createUser($_POST);

        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>