<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
	$msg = '';

	if(isset($_GET['status']) && $_GET['status']=='success'){
		$msg = 'Your account has been created.';
	}elseif (isset($_GET['state']) && $_GET['state']=='notlogin') {
		$msg = 'Please login your account to post ad.';
	}
?>

<section id="login_sec" class="setViewHeight">
	<div class="container">

		<?php if(isset($_GET['status']) && $_GET['status']=='success'){ ?>

			<div class="alert_box success">
				<p><?php echo $msg ?></p>
			</div>

		<?php 
			}elseif (isset($_GET['state']) && $_GET['state']=='notlogin') {
		?>

			<div class="alert_box warning">
				<p><?php echo $msg ?></p>
			</div>

		<?php
			}
		?>

		<div class="login_outer">
			
			<div class="login_box">
			
				<h2>User Login</h2>
				<form method="POST" action="<?php echo URLROOT.'/users/login'?>">
					<input type="text" name="email" placeholder="Email">
					<p class="error_p"><?php echo $data['emailError'] ?></p>
					<input type="password" name="password" placeholder="Password">
					<p class="error_p"><?php echo $data['passwordError'] ?></p>
					<input type="submit" value="Login">
				</form>
				<a href="#">Forgot Password ?</a>
			</div>
			
		</div>

	</div>
</section>

<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>