<?php

$p = new product();

$ename = "";
$ecode = "";
$etags = "";
$ecategoryId = "";
$ebrandId = "";
$eunitId = "";
$ediscount = "";
$eprice = "";


if(isset($_POST['submit']))
{
	$p = loadUserData($p);
	
	$er = 0;
	
	if($p->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($p->Code == "")
	{
		$er++;
		$ecode = "Required";
	}
	
	if($p->Tags == "")
	{
		$er++;
		$etags = "Required";
	}
	
	if($p->CategoryId == "0")
	{
		$er++;
		$ecategoryId = "Required";
	}
	if($p->BrandId == "0")
	{
		$er++;
		$ebrandId = "Required";
	}
	
	if($p->UnitId == "0")
	{
		$er++;
		$eunitId = "Required";
	}
	
	if($p->Price == "")
	{
		$er++;
		$eprice = "Required";
	}
	
	if($p->Discount == "")
	{
		$er++;
		$ediscount = "Required";
	}

	
	if($er == 0)
	{
		if($p->Insert())
		{
			$html->SuccessMessage("Product Inserted to system");
			$p = new product();
		}
		else{
			$html->ErrorMessage($p->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $p->Name, $ename);
$html->TextField("Code", $p->Code, $ecode);
$html->TextField("Tags", $p->Tags, $etags);

$ctg = new category();
$html->SelectField("CategoryId", $ctg->Select(),$p->CategoryId, $ecategoryId);

$bnd = new brand();
$html->SelectField("BrandId", $bnd->Select(),$p->BrandId, $ebrandId);

$unt = new unit();
$html->SelectField("UnitId", $unt->Select(),$p->UnitId, $eunitId);


$html->TextField("Price", $p->Price, $eprice);

$html->TextField("Discount", $p->Discount, $ediscount);

$html->TextArea("Description", $p->Description);


$html->Submit();
$html->FormEnd();

?>