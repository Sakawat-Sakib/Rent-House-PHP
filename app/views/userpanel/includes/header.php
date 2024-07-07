<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo SITENAME; ?></title>
	<meta charset="utf-8">

	<!--Style Sheet-->
	<link rel="stylesheet" href="<?php echo URLROOT.'/public/asset/css/style.css' ?>">

	<!--google font-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cabin+Condensed:wght@400;700&family=Sen:wght@400;800&family=Ubuntu+Condensed&display=swap" rel="stylesheet"> 
	
	<!--font awesome-->
	<script src="https://kit.fontawesome.com/adb09d24f1.js" crossorigin="anonymous"></script>

</head>
<body>

<nav>
	<div>
		<a id="logo_text" href="<?php echo URLROOT.'/pages/index' ?>">Bashalagbe.com</a>
	</div>
	
	<div class="lrs_box">
		<a class="pst_btn btn" href="<?php echo URLROOT.'/posts/addingPost'?>">Post Ad</a>
		<a href="<?php echo URLROOT.'/pages/allpost'?>">All Ads</a>
		<?php 
			if(isset($_SESSION['user_id'])){
		?>	
			
			
			<a href="<?php echo URLROOT.'/users/profile'?>"><i class="fas fa-user"></i></a>
			
		<?php
			}else{
		?>
			<a href="<?php echo URLROOT.'/users/login'?>">Login</a>
			<a href="<?php echo URLROOT.'/users/register'?>">Register</a>
		<?php
			}
		?>
	</div>
</nav>
