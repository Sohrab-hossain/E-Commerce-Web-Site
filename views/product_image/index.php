<?php
$pi = new productImage();

if(isset($_GET['id']))
{
	$pi->Id = base64_decode($_GET["id"]);
	commonDelete($pi);
}

createLink();

$table = $pi->Select();

print '<table>'."\n";
		print '<thead><tr><th>Product Info</th><th>Image</th>';
		print '<th>#</th></tr></thead>';
		foreach($table as $row)
		{
			print '<tr>';
			print '<td>'.$row["product"].'<br> '.$row["dateTime"].'<br><p>'.$row["title"].'</p></td>';
			print '<td><img src="uploads/productImages/'.$row["id"].'_'.$row["image"].'"/></td>';
			print '<td>'.EditDeleteLink($row["id"]).'</td>';
			print '</tr>';
		}
		print '</table>';


?>