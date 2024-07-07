<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
?>

<section id="banner">
		<div class="home_text_box">
			<div>
				<h1 class="up">FIND THE PERFECT PLACE</h1>
				<h1 class="down">LIVE THE DREAM </h1>
				<a href="<?php echo URLROOT.'/pages/allpost'?>">Explore More</a>
			</div>
		</div>

		<div class="home_img_box">
			
			
			<img src="<?php echo URLROOT.'/asset/img/home.svg' ?>">
			
		</div>
	

</section>

<section>
	<div class="container">
		<div class="first_imp_box">

			<i class="fas fa-search-location"></i>
			<h1>Are You Looking For A Residence ?</h1>

			<div class="cat_show">
				<a href="<?php echo URLROOT.'/pages/allpost/1/-1/-1/'.$data[1][0]['id'].'/-1' ?>">
					<i class="fas fa-restroom"></i>
					<p><?php echo $data[1][0]['category']?></p>
				</a>
				<a href="<?php echo URLROOT.'/pages/allpost/1/-1/-1/'.$data[1][1]['id'].'/-1' ?>">
					<i class="fas fa-male"></i>
					<p><?php echo $data[1][1]['category']?></p>
				</a>
				<a href="<?php echo URLROOT.'/pages/allpost/1/-1/-1/'.$data[1][2]['id'].'/-1' ?>">
					<i class="fas fa-people-arrows"></i>
					<p><?php echo $data[1][2]['category']?></p>
				</a>

			</div>

		</div>
	</div>
</section>


<section>
	<div class="container">
		<div class="title_box">
			<h1>Recent Ads</h1>
		</div>
		<div class="recent_ads">

			<!--SINGLE PRODUCT-->
			<?php
				foreach ($data[0] as $post) {
			?>
				<div class="single_product">
					<a href="<?php echo URLROOT.'/posts/postdetails/'.$post['id'].'/posts' ?>">
						<div class="product_img">
							<img src="<?php echo URLROOT.'/public/asset/img/product/'.$post['img_1'] ?>">
							<?php
								if($post['booked'] == 0){
									$clsName = 'free';
									$text = 'Available';
								}elseif($post['booked'] == 1){
									$clsName = 'kept';
									$text = 'Booked';
								}
							?>
							<div class="availability <?php echo $clsName ?>">
								<p><?php echo $text ?></p>
							</div>
						</div>
						<div class="info_box">
							<h3><?php echo $post['category'] ?></h3>
							<p><?php echo $post['area'] ?> , <?php echo $post['location'] ?></p>
							<p>TK <?php echo $post['price'] ?> /month</p>

							<?php
								date_default_timezone_set('Asia/Dhaka');
								$addedTime = new DateTime($post['added_on']);
								$timeDiff = $addedTime->diff(new DateTime());

								if($timeDiff->y > 0){
									$value = $timeDiff->y;
									$unit = 'y';
								}elseif($timeDiff->m > 0){
									$value = $timeDiff->m;
									$unit = 'm';
								}elseif($timeDiff->d > 0){
									$value = $timeDiff->d;
									$unit = 'd';
								}elseif($timeDiff->h > 0){
									$value = $timeDiff->h;
									$unit = 'h';
								}elseif($timeDiff->i > 0){
									$value = $timeDiff->i;
									$unit = 'min';
								}else{
									$value = '';
									$unit = 'Just Now';
								}
							?>
							<p class="time_box"><i class="far fa-clock"></i><?php  echo($value." ".$unit) ?> </p>

							
						</div>
					</a>

					<div class="bed_bath_box">
						<div class="bed_box">
							<i class="fas fa-bed"></i>
							<span><?php echo $post['bedroom'] ?></span>
						</div>
						<div class="bath_box">
							<i class="fas fa-tint"></i>
							<span><?php echo $post['bathroom'] ?></span>
						</div>
					</div>
					
				</div>

			<?php
				}
			?>

			<!--SINGLE POST END -->
		</div>
	</div>
	
</section>







<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>