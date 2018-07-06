<?php

$ps = new purchaseStatus();

$estatusId = "";
$epurchaseId = "";

if(isset($_POST['submit']))
{
	$ps = loadUserData($ps);
	$ps->UserId = 1; // $_SESSION['id']
	
	
	$er = 0;
	
        
                  if($ps->StatusId == "0")
	{
		$er++;
		$estatusId = "select One";
	}
        
                if($ps->PurchaseId == "0")
	{
		$er++;
		$epurchaseId = "select One";
	}
	
	
	if($er == 0)
	{
		if($ps->Insert())
		{
			$html->SuccessMessage("Purchase Status Inserted to system");
			$ps = new purchaseStatus();
		}
		else{
			$html->ErrorMessage($ps->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin("enctype=\"multipart/form-data\"");
$st = new status();
$html->SelectField("StatusId", $st->Select(),$ps->StatusId, $estatusId);
$pch = new purchase();
$html->SelectField("PurchaseId", $pch->Select(),$ps->PurchaseId, $epurchaseId);
$html->Submit();
$html->FormEnd();

?>
