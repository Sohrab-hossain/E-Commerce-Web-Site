<?php
$cnt = new country();
$cnt->Id = base64_decode($_GET['id']);

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
		if($cnt->Update())
		{
			$html->SuccessMessage("Data Updated");
		}
		else{
			$html->ErrorMessage($cnt->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}
else{
	$cnt->SelectById();
}

$html->FormBegin();
$html->TextField("Name", $cnt->Name, $ename);
$html->Submit();
$html->FormEnd();
?>