<?php
$html->FormBegin();
$html->TextField("email", $email, $eemail);
$html->PasswordField("password", $password, $epassword);
$html->Submit("btnLogin", "Login");
$html->FormEnd();
?>