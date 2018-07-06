<?php

$unt = new unit();

$ename = "";
$edescription = "";
$eprimaryQuantity = "";

if(isset($_POST['submit']))
{
	$unt = loadUserData($unt);
	
	$er = 0;
	
	if($unt->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	if($unt->Description == "")
	{
		$er++;
		$edescription = "Required";
	}
	
	if($unt->PrimaryQuantity <= 0)
	{
		$er++;
		$eprimaryQuantity = "Required";
	}
	
	if($er == 0)
	{
		if($unt->Insert())
		{
			$html->SuccessMessage("Unit Inserted to system");
			$unt = new unit();
		}
		else{
			$html->ErrorMessage($unt->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $unt->Name, $ename);
$html->TextArea("Description", $unt->Description, $edescription);
$html->TextField("PrimaryQuantity", $unt->PrimaryQuantity, $eprimaryQuantity);
$html->Submit();
$html->FormEnd();

?>