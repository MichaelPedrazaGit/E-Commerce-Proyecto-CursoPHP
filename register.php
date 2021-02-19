<?php
$archive = fopen('users/' . $_POST['username'] . ".txt", 'a+'); //Archivo

foreach ($_POST as $key => $value) {
    $dataWrite = '';//Dato a sobresccribir
    if ($value != null || $value != '') {
        $dataWrite = $value;
    }
    if ($key == "password") {
        fwrite($archive, $dataWrite);
        break;
    } else {
        fwrite($archive, "$dataWrite\n");
    }
}
fclose($archive);
$usernameCookie = $_POST['username'];
setcookie('usernameCookie',$usernameCookie);
header('Location: index.php');

?>