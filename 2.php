<?php
function ValidateUser($username)
{
    return preg_match('/^((?!([0-9]))(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,9})$/', $username);
}

$user1 = "Xrutaf888";
$user2 = "1Diana";
if (ValidateUser($user1)) {
    echo $user1 . " Is Valid";
} else {
    echo $user1 . " Is Invalid";
}
echo "</br>";

if (ValidateUser($user2)) {
    echo $user2 . " Is Valid";
} else {
    echo $user2 . " Is Invalid";
}
echo "</br>";

function ValidatePassword($password)
{
    return preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\=])\S*$/', $password);
}

$password1 = "passW0rd=";
$password2 = "C0d3YourFuture!#";

if (ValidatePassword($password1)) {
    echo $password1 . " Is Valid";
} else {
    echo $password1 . " Is Invalid";
}
echo "</br>";
if (ValidatePassword($password2)) {
    echo $password2 . " Is Valid";
} else {
    echo $password2 . " Is Invalid";
}

