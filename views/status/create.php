
<?php

$st = new status();

$ename = "";
$edescription = "";

if(isset($_POST['submit']))
{
	$st = loadUserData($st);
	
	$er = 0;
	
	if($st->Name == "")
	{
		$er++;
		$ename = "Required";
	}
	if($st->Description == "")
	{
		$er++;
		$edescription = "Required";
	}
	
	
	if($er == 0)
	{
		if($st->Insert())
		{
			$html->SuccessMessage("Brand Inserted to system");
			$st = new status();
		}
		else{
			$html->ErrorMessage($st->Error);
		}
		
	}
	else{
		$html->ErrorMessage("You have some error in your form, please review");
	}
	
}

$html->FormBegin();
$html->TextField("Name", $st->Name, $ename);
$html->TextArea("Description", $st->Description, $edescription);
$html->Submit();
$html->FormEnd();

?>