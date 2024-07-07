<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
?>

<section class="setViewHeight">
	<div class="container">
		<div class="error_page_box">

			<div class="error_text_box">
				<h3>Error.</h3>
				<p>Something went wrong.</p>
				<p>Please try again in an appropriate way.</p>
			</div>
			<div class="error_img_box">
				
					<img src="<?php echo URLROOT.'/asset/img/error.svg' ?>">
				
			</div>

		</div>
	</div>
</section>

<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>