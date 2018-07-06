<?php

$ct = new city();

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
		if($ct->Insert())
		{
			$html->SuccessMessage("City Inserted to system");
			$ct = new city();
		}
		else{
			$html->ErrorMessage($ct->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $ct->Name, $ename);
$cnt = new country();
$html->SelectField("CountryId", $cnt->Select(),$ct->CountryId, $ecountry);
$html->Submit();
$html->FormEnd();

?>