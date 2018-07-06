<?php
$pm = new paymentMethod();

if(isset($_GET['id']))
{
	$pm->Id = base64_decode($_GET["id"]);
	commonDelete($pm);
}

createLink();
$html->Table($pm->Select());
?>