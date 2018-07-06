<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php print $title; ?></title>
	<?php 
	loadClientCSS();
	loadJS();
	loadFonts();
	?>
	
</head>
<body>
	<div class="header">
		<img src="images/logo.png"/>
		<div>
			<h1>US 34 Ecommerce (PUBLIC Page)</h1>
			<span>Full Raw PHP with OOP, Developed by all student</span>
		</div>
	</div>
	<div class="main container-fluid">
		<div class="adminMenu">
			<?php require('views/shared/_publicMenu.php');?>
		</div>
		<div class="content">
			<?php
			include('includes/controller.php');
			?>
		</div>
	</div>
	<div class="footer">
		footer here
	</div>
	
</body>
</html>