<ul id="css3menu1" class="topmenu">
	<li><a href="">Home</a></li>
	<li><a href="?controller=country">Country</a></li>
	<li><a href="?controller=city">City</a></li>
	<li><a href="?controller=users">Users</a></li>
	<li><a href="#">Product</a>
		<ul>
			<li><a href="?controller=category">Category</a></li>
			<li><a href="?controller=unit">Unit</a></li>
			<li><a href="?controller=brand">Brand</a></li>
			<li><a href="?controller=product">Product</a></li>
			<li><a href="?controller=product_image">Image</a></li>
			<li><a href="?controller=product_like">Like</a></li>
			<li><a href="?controller=product_comments">Comments</a></li>
		</ul>
	</li>
	
	<li><a href="#">Purchase</a>
	<ul>
		<li><a href="?controller=payment_method">Payment Methode</a></li>
		<li><a href="?controller=status">Status</a></li>
		<li><a href="?controller=purchase">Purchase</a></li>
		<li><a href="?controller=purchase_details">Purchase Details</a></li>
		<li><a href="?controller=purchase_status">Purchase Status</a></li>
	</ul>
	</li>
	<?php
	if(isset($_SESSION['type']))
	{
		print '<li><a href="?controller=users&view=edit&id=7">'.$_SESSION['name'].'</a></li>
	<li><a href="?controller=account&view=logout">Logout</a></li>';
		
	}
	else{
		print '<li><a href="#">Welcome Guest</a></li>
	<li><a href="?controller=account&view=login">Login</a></li>';
	}
	?>
</ul>