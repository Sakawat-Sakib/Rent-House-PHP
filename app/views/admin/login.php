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

<section class="login_form_container">

	<form method="POST" action="<?php echo URLROOT.'/admin/login'?>"> 
		<input type="text" name="username" placeholder="Username">
		<p class="error_p"><?php echo $data['usernameError']?></p>
		<input type="password" name="password" placeholder="password">
		<p class="error_p"><?php echo $data['passwordError']?></p>
		<input type="submit" value="Submit">
	</form>

</section>

<script src="<?php echo URLROOT.'/public/asset/admin/js/main.js'?>"></script>
</body>
</html>