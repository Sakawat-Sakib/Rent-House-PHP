<?php
	session_start();

	if(isset($_SESSION['admin_id'])){
		
	}else{
		header('location:'.URLROOT.'/admin/login');
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	
	<!--style sheet-->
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT.'/public/asset/admin/css/style.css' ?>" >

	<!--google font-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cabin+Condensed:wght@400;700&family=Sen:wght@400;800&family=Ubuntu+Condensed&display=swap" rel="stylesheet"> 
	
	<!--font awesome-->
	<script src="https://kit.fontawesome.com/adb09d24f1.js" crossorigin="anonymous"></script>
</head>
<body>

<nav>
	<div class="logo_menu_box">
		<p><a href="<?php echo URLROOT.'/admin/index'?>">Bashalagbe</a></p>
		<i id="menu_bar" class="fas fa-bars"></i>
	</div>
	<div class="user_box">
		<i class="fas fa-user"></i>
		<i class="fas fa-sort-down"></i>
	</div>
	<div class="login_logout_box">
		<ul>
			<li><a href="<?php echo URLROOT.'/admin/logout'?>">Logout</a></li>
		</ul>
	</div>
</nav>

<div class="menu_box">
	<ul>
		<li><i class="fas fa-tachometer-alt"></i><p>Dashboard</p></li>
		<li><a href="<?php echo URLROOT.'/admin/posts'?>"><i class="far fa-clone"></i><p>Posts</p></a><i class="fas fa-angle-right"></i></li>
		<li><a href="<?php echo URLROOT.'/admin/pending'?>"><i class="fas fa-sync-alt"></i><p>Pending</p></a><i class="fas fa-angle-right"></i></li>
		<li><a href="<?php echo URLROOT.'/admin/category'?>"><i class="fas fa-list-ul"></i><p>Categories</p></a><i class="fas fa-angle-right"></i></li>
		<li><a href="<?php echo URLROOT.'/admin/locations'?>"><i class="fas fa-map-marker-alt"></i><p>Locations</p></a><i class="fas fa-angle-right"></i></li>
		<li><a href="<?php echo URLROOT.'/admin/areas'?>"><i class="fas fa-map-marked-alt"></i><p>Areas</p></a><i class="fas fa-angle-right"></i></li>
		<li><a href="<?php echo URLROOT.'/admin/users'?>"><i class="fas fa-users"></i><p>Users</p></a><i class="fas fa-angle-right"></i></li>
		<li><a href="<?php echo URLROOT.'/admin/messages'?>"><i class="far fa-comment-alt"></i></i><p>Message</p></a><i class="fas fa-angle-right"></i></li>
	</ul>
</div>



<div class="summary_box">

	<div class="daily_post inner_box">
		<div>
			<p>DAILY POST</p>
			<h1>232</h1>
		</div>
		<div class="icon_box">
			<i class="far fa-clone"></i>
		</div>
	</div>

	<div class="post_pending inner_box">
		<div>
			<p>POST PENDING</p>
			<h1>47</h1>
		</div>
		<div class="icon_box">
			<i class="fas fa-sync-alt"></i>
		</div>
	</div>

	<div class="daily_traffic inner_box">
		<div>
			<p>MESSAGE</p>
			<h1>54</h1>
		</div>
		<div class="icon_box">
			<i class="far fa-comment-alt"></i>
		</div>
	</div>

	<div class="daily_income inner_box">
		<div>
			<p>DAILY INCOME</p>
			<h1>65000Tk</h1>
		</div>
		<div class="icon_box">
			<i class="fas fa-money-check-alt"></i>
		</div>
	</div>

</div>
