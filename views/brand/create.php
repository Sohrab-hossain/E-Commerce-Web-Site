
<?php

$bnd = new brand();

$ename = "";
$edescription = "";

if(isset($_POST['submit']))
{
	$bnd = loadUserData($bnd);
	
	$er = 0;
	
	if($bnd->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	if($bnd->Description == "")
	{
		$er++;
		$edescription = "Required";
	}
	
	
	if($er == 0)
	{
		if($bnd->Insert())
		{
			$html->SuccessMessage("Brand Inserted to system");
			$bnd = new brand();
		}
		else{
			$html->ErrorMessage($bnd->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $bnd->Name, $ename);
$html->TextArea("Description", $bnd->Description, $edescription);
$html->Submit();
$html->FormEnd();

?>