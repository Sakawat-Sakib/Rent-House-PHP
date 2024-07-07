<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
?>

<section id="register_sec" class="setViewHeight">
	<div class="container">
		<div class="register_outer">

			<div class="register_box">
				<h2>Register</h2>


				<form action="" method="POST">
					<input type="text" name="name" placeholder="Full Name" value="<?php echo (isset($data['name']) && $data['name'] != '') ? $data['name'] :'' ?>">
					<p class="error_p"><?php echo $data['nameError'] ?></p>

					<input type="email" name="email" placeholder="Email" value="<?php echo (isset($data['email']) && $data['email'] != '') ? $data['email'] :'' ?>">
					<p class="error_p"><?php echo $data['emailError'] ?></p>

					<input type="password" name="password" placeholder="Password">
					<p class="error_p"><?php echo $data['passwordError'] ?></p>

					<input type="password" name="confirmPassword" placeholder="Confirm Password">
					<p class="error_p"><?php echo $data['confirmPasswordError'] ?></p>
					
					<input type="submit"  value="Register">
				</form>


			</div>
			
		</div>
	</div>
</section>

<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>