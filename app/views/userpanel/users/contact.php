<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
?>

<section class="setViewHeight">
	<div class="container ">

		<div class="contact_box_container">
			<div class="contact_inner">
				<p>Contact Us</p>
				<form action="<?php echo URLROOT.'/users/contact'?>" method="POST">
					<input type="text" name="name" placeholder="Your Name">
					<p class="error_p"><?php echo $data['nameError'] ?></p>
					<input type="email" name="email" placeholder="Email">
					<p class="error_p"><?php echo $data['emailError'] ?></p>
					<label>Message</label>
					<textarea name="message"></textarea>
					<p class="error_p"><?php echo $data['messageError'] ?></p>					
					<input type="submit" value="Send Message">
				</form>
			</div>
			<div class="contact_svg">
				<img src="<?php echo URLROOT.'/asset/img/contact.svg' ?>">
			</div>
		</div>


	</div>
</section>

<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>