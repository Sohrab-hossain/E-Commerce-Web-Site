<?php
$ctg = 0;
if(isset($_GET['ctg']))
{
	$ctg = $_GET['ctg'];
}

include('includes/cartProcessor.php');

print '<div class="summery">'.cartSummery().', <a href="?controller=public&view=cart">go to CART</a> </div>';

$p = new product();
$table = $p->Select();

foreach($table as $row)
{
	print '<div class="product">'."\n";
	print '<h1>'.$row['name'].', <i>'.$row["code"].'</i></h1>';
	findImage($row['id']);
	print '<div>';
	print '<span>Price : <i class="kata">'.$row["price"].'</i> - '.$row["discount"].'% = <b>'.($row["price"] - ($row["price"] * ($row["discount"] / 100))).'</b></span>';
	
	if(itemExists($row['id']))
	{
		print '<span><a href="#" class="addedToCart fa fa-check">Added to Cart</a>';
	}
	else
	{
		print '<span><a href="?ctg='.$ctg.'&product='.$row['id'].'" class="addToCart fa fa-cart-plus">Add to Cart</a>';
	}
	
	print '<a href="" class="wishList fa fa-plus-square">Wishlist</a></span>';
	
	
	print '</div>';
	print '<p>'.$row["description"].'</p>';
	print "</div>\n";
}

function findImage($pid)
{
	$pi = new productImage();
	$table = $pi->Select(" where pi.productId = ".$pid);
	foreach($table as $row)
	{
		print '<a href="?controller=public&view=details&id='.$pid.'"><img src="uploads/productImages/'.$row["id"].'_'.$row["image"].'" /></a>';
		break;
	}
}


?>