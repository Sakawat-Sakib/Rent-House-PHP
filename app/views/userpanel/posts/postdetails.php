<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');

?>


<section id="details_sec">
	<div class="container">

		<div class="details_box">

			<div class="name_box">

				<div>
					<h2><?php echo $data['category'] ?></h2>
					<div class="exact_loc_box">
						<i class="fas fa-map-marker-alt"></i>
						<p><?php echo $data['area'] ?> , <?php echo $data['location'] ?></p>
					</div>
				</div>

				<?php
					$table = explode('/', $_GET['url'])[3];
					if(isset($table) && $table == 'posts'){
				?>
						<div class="time_info">

							<?php
								date_default_timezone_set('Asia/Dhaka');
								$addedTime = new DateTime($data['added_on']);
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


								if($data['booked'] == 0){
									$txt = 'Available';
									$clsName = 'frontFree';
								}elseif($data['booked'] == 1){
									$txt = 'Booked';
									$clsName = 'frontBooked';
								}
							?>

							
							<p class="statusFront <?php echo $clsName ?>"><?php echo $txt ?></p>
							<p><i class="far fa-clock"></i> <?php echo($value." ".$unit)?></p>
								
						

						</div>
				<?php
					}
				?>	
			</div>


			<div class="detail_inner_box">

				<div class="detail_img_box">
					<div class="full_img_box">
						<img id="fullImg" src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_1'] ?>">
					</div>
					<div class="small_img_boxs">

						<?php
							if(isset($data['img_1']) && $data['img_1'] != ''){	
						?>
							<div  class="small_img_box">
								<img src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_1'] ?>">
							</div>
						<?php
							}
						?>

						<?php
							if(isset($data['img_2']) && $data['img_2'] != ''){	
						?>
							<div  class="small_img_box">
								<img src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_2'] ?>">
							</div>
						<?php
							}
						?>

						<?php
							if(isset($data['img_3']) && $data['img_3'] != ''){	
						?>
							<div  class="small_img_box">
								<img src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_3'] ?>">
							</div>
						<?php
							}
						?>

						<?php
							if(isset($data['img_4']) && $data['img_4'] != ''){	
						?>
							<div  class="small_img_box">
								<img src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_4'] ?>">
							</div>
						<?php
							}
						?>


						<?php
							if(isset($data['img_5']) && $data['img_5'] != ''){	
						?>
							<div  class="small_img_box">
								<img src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_5'] ?>">
							</div>
						<?php
							}
						?>
						

					</div>
				</div>

				<div class="author_box">

					<div class="author_name_box">
						<i class="fas fa-user-alt"></i>
						<h2><?php echo $data['name'] ?></h2>
						<div class="cell_box">
							<i class="fas fa-phone-alt"></i>
							<p><?php echo $data['contact'] ?></p>
						</div>
					</div>

					<div class="author_adrs_box">
						<i class="far fa-calendar-alt"></i>
						<p class="medium_text"><small>Free From :</small> <?php echo  date("d-m-Y", strtotime($data['free_from']))  ?></p>
					</div>

					<div class="author_price_box">
						<i class="fas fa-money-check-alt"></i>
						<p class="medium_text">TK <?php echo $data['price'] ?> /month</p>
					</div>

				</div>

			</div>


			<div class="detail_info_box">
				<p>Details Information</p>
			</div>


			<div class="flat_info_box">

				<div>
					<p>Bedroom</p>
					<p><?php echo $data['bedroom'] ?></p>
				</div>

				<div>
					<p>Bathroom</p>
					<p><?php echo $data['bathroom'] ?></p>
				</div>

				<div>
					<p>Belcony</p>
					<p><?php echo $data['belcony'] ?></p>
				</div>

				<div>
					<p>floor</p>
					<p><?php  echo (isset($data['floor_no']) && $data['floor_no'] == 0) ? 'Ground Floor' : $data['floor_no']  ?></p>
				</div>

				<div>
					<p>size</p>
					<p><?php echo $data['size'] ?> sqft</p>
				</div>

				<div>
					<p>Gas</p>
					<p><?php echo $data['gas'] ?></p>
				</div>

				<div>
					<p>Parking</p>
					<p><?php echo $data['parking'] ?></p>
				</div>

				<div>
					<p>Lift</p>
					<p><?php echo $data['lift'] ?></p>
				</div>

				<div>
					<p>CCTV</p>
					<p><?php echo $data['cctv'] ?></p>
				</div>

				<div>
					<p>Wifi</p>
					<p><?php echo $data['wifi'] ?></p>
				</div>

			</div>

			<div class="description">
				<p>Description</p>
			</div>
			<div class="description_info_box">
				<P>
					<?php echo $data['full_desc'] ?>
				</P>
				
				
			</div>

			<div class="exact_location">
				<h3> Exact Location <i class="fas fa-map-marker-alt"></i></h3>
				<p>Sector No : <?php echo $data['sector_no'] ?></p>
				<p>Road No : <?php echo $data['road_no'] ?></p>
				<p>House No : <?php echo $data['house_no'] ?></p>
				<p>Short Description : <?php echo $data['short_desc'] ?></p>
			</div>
		</div>

	</div>
</section>


<script src="<?php echo URLROOT.'/public/asset/js/fullimg.js'?>"></script>
<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>