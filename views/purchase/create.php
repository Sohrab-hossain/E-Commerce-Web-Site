<?php

$pch = new purchase();


$enumber = "";
$edateTime = "";
$etotal = "";
$edeliveryCharge = "";
$evat = "";
$ediscount = "";
$epaymentMethodId = "";


if(isset($_POST['submit']))
{
	$pch = loadUserData($pch);
	$pch->UserId = 1; //$_SESSION['id']; 
	
	$er = 0;
        
    if($pch->Number == "")
	{
		$er++;
		$enumber = "Required";
	}
        
    if($pch->DateTime == "")
	{
		$er++;
		$edateTime = "Required";
	}
	
    if($pch->Total == "")
	{
		$er++;
		$etotal = "Required";
	}
        
                  if($pch->DeliveryCharge == "")
	{
		$er++;
		$edeliveryCharge = "Required";
	}
        
                  if($pch->Vat == "")
	{
		$er++;
		$evat = "Required";
	}
        
    if($pch->Discount == "")
	{
		$er++;
		$ediscount = "Required";
	}
        
    if($pch->PaymentMethodId == "0")
	{
		$er++;
		$epurchaseId = "select One";
	}
	
	if($er == 0)
	{
		if($pch->Insert())
		{
			$html->SuccessMessage("Purchase Inserted to system");
			$pch = new purchase();
		}
		else{
			$html->ErrorMessage($pch->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin("enctype=\"multipart/form-data\"");
$html->TextField("Number", $pch->Number, $enumber);
$html->DateField("DateTime", $pch->DateTime, $edateTime);
$html->TextField("Total", $pch->Total, $etotal);
$html->TextField("DeliveryCharge", $pch->DeliveryCharge, $edeliveryCharge);
$html->TextField("Vat", $pch->Vat, $evat);
$html->TextField("Discount", $pch->Discount, $ediscount);
$sm = new paymentMethod();
$html->SelectField("PaymentMethodId", $sm->Select(),$pch->PaymentMethodId, $epaymentMethodId);

$html->Submit();
$html->FormEnd();

?>
