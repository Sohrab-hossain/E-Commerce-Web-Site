<?php
$pd = new purchaseDetails();
if(isset($_GET['id']))
{
	$pd->Id = base64_decode($_GET["id"]);
	commonDelete($pd);
}

createLink();
$html->Table($pd->Select());
?>