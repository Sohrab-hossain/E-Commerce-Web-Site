<?php

$pd = new purchaseDetails();

$ePurchaseId = "";
$eProductId = "";
$eRate = "";
$eQty= "";

if(isset($_POST['submit']))
{
	$pd = loadUserData($pd);
	
	$er = 0;
	
	if($pd->PurchaseId == "")
	{
		$er++;
		$ePurchaseId = "Required";
	}
	
	if($pd->ProductId == "0")
	{
		$er++;
		$eProductId = "Select One";
	}
	if($pd->Rate == "0")
	{
		$er++;
		$eRate= "Select One";
	}
	if($pd->Qty == "0")
	{
		$er++;
		$eQty = "Select One";
	}

	if($er == 0)
	{
		if($pd->Insert())
		{
			$html->SuccessMessage("Purchase Chase Inserted to system");
			$pd = new purchasedetails();
		}
		else{
			$html->ErrorMessage($pd->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$pc = new purchase();
$html->SelectField("PurchaseId",$pc->Select(),$pd->PurchaseId, $ePurchaseId);
$p = new product();
$html->SelectField("ProductId", $p->Select(),$pd->ProductId, $eProductId);
$html->TextField("Rate",$pd->Rate,$eRate);
$html->TextField("Qty",$pd->Qty,$eQty);
$html->Submit();
$html->FormEnd();

?>