<?php

$cnt = new country();

if(isset($_GET['id']))
{
	$cnt->Id = base64_decode($_GET["id"]);
	commonDelete($cnt);
}

createLink();
$html->Table($cnt->Select());


?>