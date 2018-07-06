<?php
$pch = new purchase();

if(isset($_GET['id']))
{
	$ps->Id = base64_decode($_GET["id"]);
	commonDelete($pch);
}

createLink();
$html->Table($pch->Select());


?>