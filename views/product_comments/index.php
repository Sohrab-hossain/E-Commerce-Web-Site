<?php
$pc = new productComment();

if(isset($_GET['id']))
{
	$pc->Id = base64_decode($_GET["id"]);
	commonDelete($pc);
}

$html->Table($pc->Select());


?>