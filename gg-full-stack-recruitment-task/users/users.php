<?php

function getUsers()
{
    return json_decode(file_get_contents('dataset/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser($data)
{
    $users = getUsers();

    $data['id'] = rand(1000000, 2000000);

    $users[] = $data;

    putJson($users);

    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function deleteUser($id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function putJson($users)
{
    file_put_contents('dataset/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;
    // Start of validation
        if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    } elseif (!preg_match('/^[A-Za-z\d.\- ]+$/', $user['name'])) {
        $isValid = false;
        $errors['name'] = 'Name should only contain alphabetic characters, digits, dots, hyphens, and spaces';
    }
    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username is required and it must be more than 6 and less then 16 character';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'This must be a valid email address';
    }

    if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number';
    }

    // In this version is used to validate the phone number format.
/*   if ($user['phone'] && !preg_match('/^\+\d{1,3}\s?\(\d{3}\)\s?\d{3}-\d{4}$/', $user['phone'])) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number in the format +XXX (XXX) XXX-XXXX';
    }
*/
    
// End Of validation

    return $isValid;
}
