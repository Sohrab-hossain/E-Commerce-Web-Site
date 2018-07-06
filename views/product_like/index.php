<?php
$pl = new productLike();

if(isset($_GET['id']))
{
	$pl->ProductId = base64_decode($_GET["productId"]);
	$pl->UserId = base64_decode($_GET["userId"]);
	commonDelete($pl);
}

$html->Table($pl->Select());


?>