<?php
function getPdo() //abrir la conexion
{
    $host = 'localhost';
    $db   = 'ecommerceproject';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {

        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
}
function validateDataLogin($pdo, $usernameValidate, $passwordValidate)
{
    $sql = "select * from usuarios where username = ?";
    $consultUsername = $pdo->prepare($sql);
    $consultUsername->execute([$usernameValidate]);
    $consultUsername = $consultUsername->rowCount();
    $resul[] = $consultUsername;
    $sql = "select * from usuarios where password = ?";
    $consultPassword = $pdo->prepare($sql);
    $consultPassword->execute([$passwordValidate]);
    $consultPassword = $consultPassword->rowCount();
    $resul[] = $consultPassword;
    return $resul;
}
function validateDataRegister($pdo, $usernameValidate, $emailValidate)
{
    $sql = "select * from usuarios where username = ?";
    $consultUsername = $pdo->prepare($sql);
    $consultUsername->execute([$usernameValidate]);
    $consultUsername = $consultUsername->rowCount();
    $resul[] = $consultUsername;
    $sql = "select * from usuarios where email = ?";
    $consultEmail = $pdo->prepare($sql);
    $consultEmail->execute([$emailValidate]);
    $consultEmail = $consultEmail->rowCount();
    $resul[] = $consultEmail;
    return $resul;
}

function createUser($pdo, $nameValidate, $usernameValidate, $emailValidate, $passwordValidate)
{   
    $sql = "INSERT 
    INTO `ecommerceproject`.`usuarios` (`nombre`, `username`, `password`, `email`)
    VALUES (?, ?, ?, ?);";
    $createUser = $pdo->prepare($sql);
    $createUser->execute([$nameValidate, $usernameValidate, $passwordValidate, $emailValidate]);
    $createUser = $createUser->rowCount();
    return $createUser;
}
