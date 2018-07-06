<?php
$ct = new city();

if(isset($_GET['id']))
{
	$ct->Id = base64_decode($_GET["id"]);
	commonDelete($ct);
}

createLink();
$html->Table($ct->Select());
?>