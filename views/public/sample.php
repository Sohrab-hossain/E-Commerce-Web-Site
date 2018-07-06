<ul id="css3menu1" class="topmenu">
	<li><a href="">Home</a></li>	
	<?php
	
	$ctgM = new category();
	$table = $ctgM->Select(" where c1.categoryId <= 0 ");
	foreach($table as $row)
	{
		print '<li><a href="?controller=public&view=sample&category='.$row["id"].'">'.$row["name"].'</a>';
		
		findSubCategory($row["id"]);
		
		print '</li>';
	}
	
	function findSubCategory($pid)
	{
		$ctgM = new category();
		$table = $ctgM->Select(" where c1.categoryId = ".$pid);
		print "<ul>";
		foreach($table as $row)
		{
			print '<li><a href="?controller=public&view=sample&category='.$row["id"].'">'.$row["name"].'</a>';

			findSubCategory($row["id"]);

			print '</li>';
		}
		print "</ul>";
	}
	
	
	?>
	
	<li><a href="?controller=users&view=edit&id=7">Mr. User Ali</a></li>
	<li><a href="?controller=users&view=logout">Logout</a></li>
</ul>