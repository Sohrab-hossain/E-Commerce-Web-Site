<?php

$cnt = new country();

$ename = "";

if(isset($_POST['submit']))
{
	$cnt = loadUserData($cnt);
	
	$er = 0;
	
	if($cnt->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($er == 0)
	{
		if($cnt->Insert())
		{
			$html->SuccessMessage("Data Inserted");
			$cnt = new country();
		}
		else{
			$html->ErrorMessage($cnt->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
}
$html->FormBegin();
$html->TextField("Name", $cnt->Name, $ename);
$html->Submit();
$html->FormEnd();
?>