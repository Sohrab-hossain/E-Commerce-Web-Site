<?php
$p = new product();

if(isset($_GET['id']))
{
	$p->Id = base64_decode($_GET["id"]);
	commonDelete($p);
}

createLink();
$html->Table($p->Select());
?>