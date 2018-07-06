<ul id="css3menu1" class="topmenu">

	<li><a href="?controller=public">Home</a></li>
	<?php
	
	$ctg = new category();
	$table = $ctg->Select("where c1.categoryId <= 0");
	foreach($table as $row)
	{
		print '<li>';
		print '<a href="?ctg='.$row['id'].'">'.$row["name"].'</a>';
		findChild($row["id"]);
		print '</li>';
	}
	
	if(isset($_SESSION['type']))
	{
		print '<li><a href="?controller=public&view=my_order">My Order</a></li>
		<li><a href="?controller=public&view=myaccount">'.$_SESSION['name'].'</a></li>
	<li><a href="?controller=public&view=logout">Logout</a></li>';
		if($_SESSION['type']=="A")
		{
			print '<li><a href="?controller=country">Admin Panel</a></li>';
		}
	}
	else{
		print '<li><a href="?controller=public&view=register">Register</a></li>
	<li><a href="?controller=public&view=login">Login</a></li>';
	}
	?>
</ul>




<?php

function findChild($pid)
{
	$ctg = new category();
	$table = $ctg->Select("where c1.categoryId = " .$pid);
	print '<ul>';
	foreach($table as $row)
	{
		print '<li>';
		print '<a href="?ctg='.$row['id'].'">'.$row["name"].'</a>';
		findChild($row["id"]);
		print '</li>';
	}
	print '</ul>';
}
?>