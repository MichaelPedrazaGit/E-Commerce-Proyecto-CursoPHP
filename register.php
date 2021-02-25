<?php
$nameValue = $_POST['name'];
$usernameValue = $_POST['username'];
$emailValue = $_POST['email'];
$passwordlValue = $_POST['password'];

include_once('database.php');
$pdo = getPdo();
setcookie('userExists','', time()-100);
setcookie('emailExists','', time()-100);
$resultQuery = validateDataRegister($pdo, $usernameValue, $emailValue);
if ($resultQuery[0] == 1) {
    setcookie('userExists', time() + 5);
    header('Location: account.php');
} else if ($resultQuery[1] == 1) {
    setcookie('emailExists', time() + 5);
    header('Location: account.php');
}else {
    $resultCreate = createUser($pdo, $nameValue, $usernameValue, $emailValue, $passwordlValue);
    if ($resultCreate == 1) {
        $usernameCookie = $_POST['username'];
        setcookie('usernameCookie',$usernameCookie);
        header('Location: index.php');
    }else {
        setcookie('errorCreate', time() + 5);
        header('Location: account.php');
    }
}

