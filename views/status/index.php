<?php
$st = new status;

if(isset($_GET['id']))
{
	$st->Id = base64_decode($_GET["id"]);
	commonDelete($st);
}

createLink();
$html->Table($st->Select());
?>
