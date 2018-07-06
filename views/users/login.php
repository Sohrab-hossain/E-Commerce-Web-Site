<?php
$email = "";
$password = "";

$eemail = "";
$epassword = "";

$html->FormBegin();
$html->TextField("email", $email, $eemail);
$html->Password("password", $password, $epassword);
$html->FormEnd();
?>