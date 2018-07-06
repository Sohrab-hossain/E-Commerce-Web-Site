<?php

$pm = new paymentMethod();

$ename = "";
$echarge = "";

if(isset($_POST['submit']))
{
	$pm = loadUserData($pm);
	
	$er = 0;
	
	if($pm->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($pm->Charge == "")
	{
		$er++;
		$echarge = "Required";
	}
	
	if($er == 0)
	{
		if($pm->Insert())
		{
			$html->SuccessMessage("Payment Method Inserted to system");
			$pm = new paymentMethod();
		}
		else{
			$html->ErrorMessage($pm->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $pm->Name, $ename);
$html->TextField("Charge", $pm->Charge, $echarge);
$html->TextArea("Description", $pm->Description);
$html->Submit();
$html->FormEnd();

?>