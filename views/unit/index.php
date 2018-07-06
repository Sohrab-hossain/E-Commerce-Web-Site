<?php
$unt = new unit();

if(isset($_GET['id']))
{
	$unt->Id = base64_decode($_GET["id"]);
	commonDelete($unt);
}

createLink();
$html->Table($unt->Select());
?>