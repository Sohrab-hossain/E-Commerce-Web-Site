<?php

$u = new users();

$ename = "";
$econtact = "";
$eemail = "";
$epassword = "";
$egender = "";
$edateOfBirth = "";
$ecityId = "";

if(isset($_POST['submit']))
{
	$u = loadUserData($u);
	
	$er = 0;
	
	if($u->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($u->Contact == "")
	{
		$er++;
		$econtact = "Required";
	}
	
	if($u->Email == "")
	{
		$er++;
		$eemail = "Required";
	}
	
	if($u->Password == "")
	{
		$er++;
		$epassword = "Required";
	}
	
	if($u->Gender == "")
	{
		$er++;
		$egender = "Required";
	}
	
	if($u->DateOfBirth == "")
	{
		$er++;
		$edateOfBirth = "Required";
	}
	
	if($u->CityId == "0")
	{
		$er++;
		$ecityId = "Select One";
	}
	
	if($er == 0)
	{
		if($u->Insert())
		{
			$html->SuccessMessage("Users Inserted to system");
			$u = new users();
		}
		else{
			$html->ErrorMessage($u->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $u->Name, $ename);
$html->TextField("Contact", $u->Contact, $econtact);
$html->TextField("Email", $u->Email, $eemail);
$html->PasswordField("Password", $u->Password, $epassword);
$html->RadioField("Gender",array("Male", "Female"), $u->Gender, $egender);
$html->DateField("DateOfBirth", $u->DateOfBirth, $edateOfBirth);
$ct = new city();
$html->SelectField("CityId", $ct->Select(),$u->CityId, $ecityId);
$html->Submit();
$html->FormEnd();

?>