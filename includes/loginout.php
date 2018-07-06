<?php
$email = "";
$password = "";
$eemail = "";
$epassword = "";

if(isset($_POST['btnLogin']))
{
	$u = new users();
	$u->Email = $_POST['email'];
	$u->Password = $_POST['password'];
	if($u->Login())
	{
		$_SESSION['id'] = $u->Id;
		$_SESSION['name'] = $u->Name;
		$_SESSION['email'] = $u->Email;
		$_SESSION['type'] = $u->Type;
	}
}

if($view == "logout")
{
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	unset($_SESSION['type']);
}

?>