<?php
include('includes/cartProcessor.php');

print '<div class="summery">'.cartSummery().', <a href="?controller=public">Continue Shopping</a> </div>';

include('includes/cartTable.php');

if(isset($_SESSION['type']))
{
	include('views/public/order.php');
}
else
{
	print '<span class="error">You have to login to confirm the order</span>';
	include('views/public/login.php');
}


?>