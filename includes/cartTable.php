<?php

$cart = array();
$total = 0;

if(isset($_SESSION['cart']))
	$cart = $_SESSION['cart'];
$i = 0;
print '<form method="post" action="">';
print '<div class="container-fluid cartDetails">';
print '<div class="row" style="background-color:black; color:white; font-weight:bold">';
print '<div class="col-md-1">SL</div><div class="col-md-3">Product</div><div class="col-md-1">Qty</div><div class="col-md-2">Price</div><div class="col-md-1">Disc</div><div class="col-md-2">Sub Total</div>';
print '</div>';
foreach($cart as $item)
{
	$p = new product();
	$p->Id = $item["productId"];
	$p->SelectById();
	
	if(isset($_POST['update']))
	{
		$item['qty'] = $_POST['qty'][$i];
	}
	
	print '<div class="row">';
	print '<div class="col-md-1">'.($i + 1).'</div>';
	print '<div class="col-md-3">'.$p->Name.' [ '.$p->Code.' ]</div>';
	print '<div class="col-md-1"><input type="text" name="qty[]" value="'.$item["qty"].'" style="width:inherit;" /></div>';
	print '<div class="col-md-2">'.$p->Price.'</div>';
	print '<div class="col-md-1">'.$p->Discount.'</div>';
	print '<div class="col-md-2">'.($item["qty"] * ($p->Price - ($p->Price * $p->Discount / 100))).'</div>';
	print '</div>';
	$total += ($p->Price - ($p->Price * $p->Discount / 100));
	$i++;
}
print '<div class="row" style="background-color:black; color:white; font-weight:bold">';
print '<div class="col-md-1"></div><div class="col-md-3"></div><div class="col-md-1"></div><div class="col-md-2"></div><div class="col-md-1">Total : </div><div class="col-md-2">'.$total.'</div>';
print '</div>';

print '<div class="row">';
print '<div class="col-md-12">
	<input type="submit" name="update" value="Update Cart"/>
	</div>';
print '</div>';

print '</div>';
print '</form>';
$_SESSION['cart'] = $cart;
?>