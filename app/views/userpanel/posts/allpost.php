<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');

	
?>



<section  class="setViewHeight">
	<div class="container filterPlusAd_box">


		<div class="filter_box_container">
			<div class="filter_box ">
				
				<h2>Filter ads</h2>

				<div class="filter_box_inner">


					<form method="POST" action="<?php echo URLROOT.'/pages/allpost' ?>">
						<div>
							<!--DISTRICT LIST-->
							<select name="dis_id" class="selectedDistrict">
								<option selected disabled  value="-1">*Select District</option>
								<?php
									foreach ($data[4] as $district) {
										if($district['id'] == $data[5][0]['dis_id'] ){
								?>
											<option selected value="<?php echo $district['id'] ?>"><?php echo $district['location'] ?></option>
								
								<?php
										}else{
								?>
											<option  value="<?php echo $district['id'] ?>"><?php echo $district['location'] ?></option>
								<?php
										}
									}
								?>
							</select>
						</div>

						<div>
							<input id="area_id_js" type="hidden" value="<?php echo $data[5][0]['area_id'] ?>">
							<!--AREA LIST-->
							<select name="area_id" class="area_list" disabled>
								<option disabled selected >*Select Area</option>
								
							</select>
						</div>


						<div>
							<!--CATEGORY-->
							<select name="cat_id">
								<option selected disabled >*Select Category</option>
								<?php
									foreach ($data[6] as $cat) {
										if($cat['id'] == $data[5][0]['cat_id'] ){
								?>
											<option selected value="<?php echo $cat['id'] ?>"><?php echo $cat['category'] ?></option>
								
								<?php
										}else{
								?>
											<option  value="<?php echo $cat['id'] ?>"><?php echo $cat['category'] ?></option>
								<?php
										}
									}
								?>
							</select>

						</div>


						<div>
							<!--BEDROOM-->
							<select name="bed_num">
									<option disabled selected >*Select Bedroom</option>
								<?php
									for ($i=1; $i <= 10 ; $i++) { 
										if($i == $data[5][0]['bed_num']){

								?>
											<option selected  value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php
										}else{

								?>	

											<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php
										}
									}

									if($data[5][0]['bed_num'] == '10+'){

								?>
										<option selected value="10+">10+</option>

								<?php
									}else{
								?>

										<option value="10+">10+</option>
								<?php
									}
								?>
							</select>
						</div>

						<div>
							<input type="submit" value="Apply Filter">
						</div>
					</form>


				</div>
			</div>
		
		</div>


		<div class="product_box">

			<?php
				if(isset($data[7]) && $data[7] != null ){

			?>

					<div class="top_ad_sec">
						<!--SINGLE PRODUCT-->
						<?php
							foreach ($data[7] as $post) {
								
							
						?>
							<div class="single_product top">
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

										<div class="batch_box">
											<img src="<?php echo URLROOT.'/asset/img/topbatch.png'?>">
										</div>
										
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

			<?php
				}
			?>

			<?php
				if(isset($_GET['result']) && $_GET['result'] == 'notfound'){
			?>
					<div class="notfound_box">
						<i class="far fa-frown"></i>
						<p>"No result found"</p>
					</div>
			<?php
				}else{
			?>

					<!--SINGLE PRODUCT-->
					<?php
						foreach ($data[3] as $post) {
							$promote_class = '';

							if($post['pro_id'] == 2){
								$promote_class = 'highlight';
								
							}
						
					?>
						<div class="single_product <?php echo $promote_class ?>">
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


					<div class="pagination">
						<ul>
							<?php
								if($data[1][0]>1){
							?>
								<a href="<?php echo URLROOT.'/pages/allpost/'.($data[1][0]-1).'/'.$data[5][0]['dis_id'].'/'.$data[5][0]['area_id'].'/'.$data[5][0]['cat_id'].'/'.$data[5][0]['bed_num'] ?>"><li>Prv</li></a>
							<?php
								}

								for($i = 1; $i <= $data[0][0] ;$i++){ 
									if($i == $data[1][0]){
										$cls = 'active';
									}else{
										$cls = '';
									}
							?> 
								<a class="<?php echo $cls ?>" href="<?php echo URLROOT.'/pages/allpost/'.$i.'/'.$data[5][0]['dis_id'].'/'.$data[5][0]['area_id'].'/'.$data[5][0]['cat_id'].'/'.$data[5][0]['bed_num'] ?>"><li><?php echo $i ?></li></a>
							<?php
								}
								if($data[1][0]<$data[2][0]){
							?>
								<a href="<?php echo URLROOT.'/pages/allpost/'.($data[1][0]+1).'/'.$data[5][0]['dis_id'].'/'.$data[5][0]['area_id'].'/'.$data[5][0]['cat_id'].'/'.$data[5][0]['bed_num'] ?>"><li>Next</li></a>

							<?php
								}
							?>



						</ul>
					</div>

			<?php
				}
			?>

		</div>

		

		

	</div>
</section>





<script src="<?php echo URLROOT.'/public/asset/js/filter.js'?>"></script>

<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>