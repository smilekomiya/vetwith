<?php
require_once "./php_function/string.php";

$email1 = "unkoman@unko.unko";
$email2 = "un@unko.unko";
$pass ="password";
$pass1 = pass_cipher($pass, $email1);
echo $pass1."<br /><br />";
$pass2 = pass_cipher($pass, $email2);
echo $pass2;
?>