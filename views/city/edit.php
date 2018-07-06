<?php
$ct = new  city();
$ct->Id = base64_decode($_GET['id']);

$ename = "";
$ecountry = "";

if(isset($_POST['submit']))
{
	$ct = loadUserData($ct);
	
	$er = 0;
	
	if($ct->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($ct->CountryId == "0")
	{
		$er++;
		$ecountry = "Select One";
	}
	
	if($er == 0)
	{
		if($ct->Update())
		{
			$html->SuccessMessage("City Updated to system");
		}
		else{
			$html->ErrorMessage($ct->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}
else{
	$ct->SelectById();
}
$html->FormBegin();
$html->TextField("Name", $ct->Name, $ename);
$cnt = new country();
$html->SelectField("CountryId", $cnt->Select(),$ct->CountryId, $ecountry);
$html->Submit();
$html->FormEnd();
?>




