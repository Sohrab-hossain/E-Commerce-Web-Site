<?php

$pch = new purchase();


$enumber = "";
$edateTime = "";
$etotal = "";
$edeliveryCharge = "";
$evat = "";
$ediscount = "";
$epaymentMethodId = "";
$eaddress = "";

if(isset($_POST['submit']))
{
	$pch = loadUserData($pch);
	$pch->UserId = $_SESSION['id']; 
	$pch->DateTime = date('Y-m-d');
	
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
	if($pch->Address == "")
	{
		$er++;
		$eaddress = "Required";
	}
	
	if($er == 0)
	{
		if($pch->Insert())
		{
			$cart = $_SESSION['cart'];
			
			foreach($cart as $item)
			{
				$p = new product();
				$p->Id = $item["productId"];
				$p->SelectById();
				
				$prcD = new purchaseDetails();
				$prcD->PurchaseId = $pch->Id;
				$prcD->ProductId = $item["productId"];
				$prcD->Qty = $item["qty"];
				$prcD->Rate = $p->Price;
				if(!$prcD->Insert())
					print '<span class="error">'.$prcD->Error.'</span>';
			}
			
			$html->SuccessMessage("Purchase Inserted to system");			
			unset($_SESSION['cart']);
			include('includes/orderPrint.php');
		}
		else{
			$html->ErrorMessage($pch->Error);
			include('includes/orderForm.php');
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}
else{
	$u = new users();
	$u->Id = $_SESSION['id'];
	$u->SelectById();
	$pch->Address = $u->Address;
	$pch->Total = $_POST['ptotal'];
	include('includes/orderForm.php');
}


?>
