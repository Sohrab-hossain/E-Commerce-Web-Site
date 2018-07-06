<?php

$pi = new productImage();

$eproductId = "";
$edateTime = "";
$eimage = "";
$etitle = "";

if(isset($_POST['submit']))
{
	$pi = loadUserData($pi);
	
	$pi->Image = $_FILES['Image'];
	
	$er = 0;
	
	if($pi->ProductId == "0")
	{
		$er++;
		$eproductId = "select One";
	}
	
	if($pi->DateTime == "")
	{
		$er++;
		$edateTime = "Required";
	}
        
    if($pi->Image["name"] == "")
	{
		$er++;
		$eimage = "Required";
	}
        
    if($pi->Title == "")
	{
		$er++;
		$etitle = "Required";
	}
	
	if($er == 0)
	{
		if($pi->Insert())
		{
			$sp = $pi->Image['tmp_name'];
			$dp = 'uploads/productImages/'.$pi->Id."_".$pi->Image['name'];
			
			move_uploaded_file($sp, $dp);
			
			$html->SuccessMessage("Product Image Inserted to system");
			$pi = new productImage();
		}
		else{
			$html->ErrorMessage($pi->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin("enctype=\"multipart/form-data\"");
$p = new product();
$html->SelectField("ProductId", $p->Select(),$pi->ProductId, $eproductId);
$html->DateField("DateTime", $pi->DateTime, $edateTime);
$html->ImageField("Image", $eimage);
$html->TextField("Title", $pi->Title, $etitle);
$html->Submit();
$html->FormEnd();

?>
