<?php
$ps = new purchaseStatus();

if(isset($_GET['id']))
{
	$ps->Id = base64_decode($_GET["id"]);
	commonDelete($ps);
}

createLink();
$html->Table($ps->Select());


?>