<?php
$bnd = new brand();

if(isset($_GET['id']))
{
	$bnd->Id = base64_decode($_GET["id"]);
	commonDelete($bnd);
}

createLink();
$html->Table($bnd->Select());
?>
