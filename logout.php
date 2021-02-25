<?php
foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', time() - 100);
}
header('Location: account.php');
?>