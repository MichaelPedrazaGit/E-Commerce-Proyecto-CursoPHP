<?php
$usernameValue = $_POST['username'];
$passwordlValue = $_POST['password'];

include_once('database.php');
$pdo = getPdo();
setcookie('userError', '', time() - 100);
setcookie('passwordError', '', time() - 100);
$resultQuery = validateDataLogin($pdo, $usernameValue, $passwordlValue);
if ($resultQuery[0] == 0) {
    setcookie('userError', time() + 5);
    header('Location: account.php');
} else if ($resultQuery[1] == 0) {
    setcookie('passwordError', time() + 5);
    header('Location: account.php');
} else {    
    $usernameCookie = $_POST['username'];
    setcookie('usernameCookie', $usernameCookie);
    header('Location: index.php');
}
