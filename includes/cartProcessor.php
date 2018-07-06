<?php

if(isset($_GET['product']))
{
	$cart = array();
	
	if(isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	
	if(!ItemExists($_GET['product']))
	{
		$item["productId"] = $_GET['product'];
		$item["qty"] = 1;
		$cart[] = $item;
	}
	$_SESSION['cart'] = $cart;
}


function cartSummery()
{
	$itemNumber = 0;
	$total = 0;
	$cart = array();
	
	if(isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
		$itemNumber = count($cart);
	}
	
	foreach($cart as $item)
	{
		$p = new product();
		$p->Id = $item['productId'];
		if($p->SelectById())
		{
			$total += $p->Price - ($p->Price * $p->Discount / 100);
		}
	}
	
	return "Total ".$itemNumber." item in CART, SubTotal : ".$total."BDT/=";
}

function ItemExists($pid)
{
	$cart = array();
	
	if(isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	
	foreach($cart as $item)
	{
		if($item["productId"] == $pid)
		{
			return true;
		}
	}
	return false;
}

?>