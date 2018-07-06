<?php
session_start();

$adminController = array("users", "unit", "status", "purchase_status", 
						 "purchase_details", "purchase", "product", "product_like", "product_image", "product_comments", "payment_method", "country", "city", "category", "brand");

include('includes/library.php');

$html = new html();

$title = "Our OOP Coaching";
$controller = "public";
$view = "index";

if(isset($_GET['controller']))
{
	$controller = $_GET['controller'];
}

if(isset($_GET['view']))
{
	$view = $_GET['view'];
}

function ms($value)
{
	global $cn;
	return mysqli_real_escape_string($cn, $value);
}

function createLink()
{
	global $controller;
	print "<a href=\"?controller=$controller&view=create\">New ".ucwords(str_replace("_", " ", $controller))."</a>";
}

function EditDeleteLink($id)
{
	global $controller;
	$s = '<a href="?controller='.$controller.'&view=edit&id='.base64_encode($id).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
	$s .= ' | <a href="?controller='.$controller.'&view=index&id='.base64_encode($id).'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
	
	return $s;
}


function commonDelete($obj)
{
	if($obj->Delete())
	{
		print '<span class="alert-success">Data Deleted</span>';
	}
	else{
		print '<span class="alert-danger">'.$obj->Error.'</span>';
	}
}

function loadUserData($obj)
{
	foreach($_POST as $k=>$v)
	{
		$obj->$k = $v;
	}
	return $obj;
}

include('includes/clientScript.php');
include('includes/loginout.php');



if($controller == "public")
{
	require('views/shared/publicLayout.php');
}
else
{
	require('views/shared/adminLayout.php');
}

?>