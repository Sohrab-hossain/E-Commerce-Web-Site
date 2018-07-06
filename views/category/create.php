<?php

$ctg = new category();

$ename = "";
$ecategory = "";

if(isset($_POST['submit']))
{
	$ctg = loadUserData($ctg);
	
	$er = 0;
	
	if($ctg->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($ctg->CategoryId == "0")
	{
		$er++;
		$ecategory = "Select One";
	}
	
	if($er == 0)
	{
		if($ctg->Insert())
		{
			$html->SuccessMessage("Category Inserted to system");
			$ctg = new category();
		}
		else{
			$html->ErrorMessage($ctg->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $ctg->Name, $ename);
$ctg2 = new category();
$html->SelectField("CategoryId", $ctg2->Select(),$ctg->CategoryId, $ecategory);
$html->TextArea("Description", $ctg->Description);
$html->Submit();
$html->FormEnd();

?>