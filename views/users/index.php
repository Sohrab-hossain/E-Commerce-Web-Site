<?php
$u = new users();

if(isset($_GET['id']))
{
	$u->Id = base64_decode($_GET["id"]);
	commonDelete($u);
}

createLink();
$html->Table($u->Select());
?>