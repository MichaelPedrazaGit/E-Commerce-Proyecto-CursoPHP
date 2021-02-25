<?php
echo "<li><a href='index.php'>Home</a></li>";
echo "<li><a href='products.php'>Products</a></li>";
echo "<li><a href=''>About</a></li>";
echo "<li><a href=''>Contact</a></li>";

if (isset($_COOKIE['usernameCookie'])) {
    $usernameCurrent = $_COOKIE['usernameCookie'];
    echo "<li> Welcome $usernameCurrent</a></li>";
    echo "<li><a href='logout.php'>Logout</a></li>";
} else {
    echo "<li><a href='account.php'>Account</a></li>";
}
?>
