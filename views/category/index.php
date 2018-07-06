<?php
$ctg = new category();

if(isset($_GET['id']))
{
	$ctg->Id = base64_decode($_GET["id"]);
	commonDelete($ctg);
}

createLink();
$html->Table($ctg->Select());
?>