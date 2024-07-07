<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');

	if(isset($_SESSION['user_id']) && $_SESSION != ''){

	}else{
		header('location:'.URLROOT.'/users/login?state=notlogin');
		die();
	}
?>

<section id="postad_sec">
	<div class="container">

		<div class="postad_title_box">
			<p>Post your Ad</p>
		</div>

		<form id="postad_form" action="" method="POST" enctype="multipart/form-data"> 


			<!-----LOCATION----->
			<!-----===========---->
			<div class="ad_location_box">

				<div class="post_head_box">
					<p>Location</p>
				</div>

				<div class="loc_inner_box">

					<div class="dis_area_box">

						<div class="dis_box">
							<label>District : <p class="error_in"> <?php echo $data[2]['districtError'] ?> </p></label>

							<select name="district_id" class="select_district">

								<option disabled selected value="-1">* Select District</option>

								<?php 
									foreach ($data[0] as $district) {
										if($district['id'] == $data[2]['district_id']){
								?>

									<option selected value="<?php echo $district['id'] ?>"><?php echo $district['location'] ?></option>
								
								<?php
									}else{
								?>
								
									<option value="<?php echo $district['id'] ?>"><?php echo $district['location'] ?></option>
								
								<?php
									}
								}
								?>
							
							</select>
						</div>


						<div class="area_box">
							<label>Area : <p class="error_in"> <?php echo $data[2]['areaError'] ?> </p></label>

							<input id="area_id_post" type="hidden" value="<?php echo $data[2]['area_id'] ?>">
							<select name="area_id" class="select_area" disabled>
								<option  disabled selected >* Select Area</option>

								
								
							</select>

						</div>

					</div>

					<div class="details_adrs_box">

						<div class="sector_box">
							<label>Sector No : <span>(optional) </span> </label>
							<input name="sectorNo" type="text" value="<?php echo (isset($data[2]['sectorNo']) && $data[2]['sectorNo'] != '') ? $data[2]['sectorNo'] : '' ?>">
						</div>
						<div class="road_box">
							<label>Road No : <span>(optional)</span></label>
							<input name="roadNo" type="text" value="<?php echo (isset($data[2]['roadNo']) && $data[2]['roadNo'] != '') ? $data[2]['roadNo'] :'' ?>">
						</div>
						<div class="house_box">
							<label>House No : <span>(optional)</span></label>
							<input name="houseNo" type="text" value="<?php echo (isset($data[2]['houseNo']) && $data[2]['houseNo'] != '') ? $data[2]['houseNo'] :'' ?>">
						</div>
						
					</div>

					<div class="short_adrs_box">
						<label>Short Description : <p class="error_in"> <?php echo $data[2]['shortDescError'] ?> </p></label>
						<input name="shortDesc" type="text" placeholder="example: dream house, new chandgaon" value="<?php echo (isset($data[2]['shortDesc']) && $data[2]['shortDesc'] != '') ? $data[2]['shortDesc'] :'' ?>">
					</div>

				</div>

				<div>
					<a href="<?php echo URLROOT.'/posts/userMap'?>" class="map_p"><i class="fas fa-map-marker-alt"></i> Select your location on map </a>
				</div>
			</div>


			<!-----BASIC INFO----->
			<!-----===========---->
			<div class="ad_basicinfo_box">

				<div class="post_head_box">
					<p>Basic Information</p>
				</div>

				<div class="adr_inner_box">

					<div>
						<label>Free From (month) :  <p class="error_in"> <?php echo $data[2]['freeFromError'] ?> </p></label>
						<input name="freeFrom" type="date" value="<?php echo (isset($data[2]['freeFrom']) && $data[2]['freeFrom'] != '') ? $data[2]['freeFrom'] :'' ?>">
					</div>

					<div >
						<label>Category :  <p class="error_in"> <?php echo $data[2]['categoryError'] ?> </p></label>
						<select name="category_id">

							<option selected disabled>*Select a category</option>
							<?php 
								foreach ($data[1] as $cat) {
									if($cat['id'] == $data[2]['category_id']){


							?>
							<option selected value="<?php echo $cat['id'] ?>"><?php echo $cat['category'] ?></option>
							<?php
								}else{
							?>
							<option value="<?php echo $cat['id'] ?>"><?php echo $cat['category'] ?></option>
							
							<?php
								}
							}
							?>
							
						</select>
					</div>

					<div>
						<label>Bedroom :  <p class="error_in"> <?php echo $data[2]['bedroomError'] ?> </p></label>

						<select name="bedroom">
							<option selected disabled>*Select bedroom no.</option>

							<?php 
								for ($i=1; $i < 11; $i++) { 
									if($i == $data[2]['bedroom']){
							?>

								<option selected value="<?php echo $i ?>"><?php echo $i ?></option>

							<?php
								}else{
							?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php 
									}
								}
							?>

							<?php
								if($data[2]['bedroom'] == '10+'){
							?>	
								<option selected value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}else{		
							?>
								<option value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}
							?>

						</select>
						
					</div>

					<div>
						<label>Bathroom :  <p class="error_in"> <?php echo $data[2]['bathroomError'] ?> </p></label>
						<select name="bathroom">
							
							<option selected disabled>*Select bathroom no.</option>
							



							<?php 
								for ($i=1; $i < 11; $i++) { 
									if($i == $data[2]['bathroom']){
							?>

								<option selected value="<?php echo $i ?>"><?php echo $i ?></option>

							<?php
								}else{
							?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php 
									}
								}
							?>

							<?php
								if($data[2]['bathroom'] == '10+'){
							?>	
								<option selected value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}else{		
							?>
								<option value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}
							?>

						</select>
						
					</div>



					<div>
						<label>Belcony :  <p class="error_in"> <?php echo $data[2]['belconyError'] ?> </p></label>
						<select name="belcony">

							<option selected disabled>*Select belcony no.</option>
							

							<?php 
								for ($i = 0; $i < 11; $i++) { 
									if($i == $data[2]['belcony']){
							?>

								<option selected value="<?php echo $i ?>"><?php echo $i ?></option>

							<?php
								}else{
							?>
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php 
									}
								}
							?>

							<?php
								if($data[2]['belcony'] == '10+'){
							?>	
									<option selected value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}else{		
							?>
									<option value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}
							?>


						</select>
						
					</div>



					<div>
						<label>Floor No :  <p class="error_in"> <?php echo $data[2]['floorNoError'] ?> </p></label>
						<select name="floorNo">
							<option selected disabled>*Select floor no.</option>
							

							<?php
								if($data[2]['floorNo'] == 'Ground floor'){
							?>	
								<option selected value="Ground floor">Ground floor</option>
							<?php
								}else{		
							?>
								<option value="Ground floor">Ground floor</option>
							<?php
								}
							?>



							<?php 
								for ($i=1; $i < 101; $i++) { 
									if($i == $data[2]['floorNo']){
							?>

								<option selected value="<?php echo $i ?>"><?php echo $i ?></option>

							<?php
								}else{
							?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php 
									}
								}
							?>



							<?php
								if($data[2]['floorNo'] == '100+'){
							?>	
								<option selected value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}else{		
							?>
								<option value="<?php echo $i-1 ?>+"><?php echo $i-1 ?>+</option>
							<?php
								}
							?>



							
						</select>
						
					</div>


					<div>
						<label>Size/sqft : <span>(optional)</span></label>
						<input name="size" type="text" value="<?php echo (isset($data[2]['size']) && $data[2]['size'] != '') ? $data[2]['size'] :'' ?>">
					</div>
					<div>
						<label>Price/month :  <p class="error_in"> <?php echo $data[2]['priceError'] ?> </p></label>
						<input name="price" type="text" value="<?php echo (isset($data[2]['price']) && $data[2]['price'] != '') ? $data[2]['price'] :'' ?>">
					</div>
					<div>
						<label>Contact No :  <p class="error_in"> <?php echo $data[2]['contactNoError'] ?> </p></label>
						<input name="contactNo" type="text" placeholder="i.e 018-64xxxxx" value="<?php echo (isset($data[2]['contactNo']) && $data[2]['contactNo'] != '') ? $data[2]['contactNo'] :'' ?>">
					</div>

				</div>
			</div>

			<!-----ADDITIONAL FEATURE----->
			<!-----===================---->
			<div class="addition_feature_box">

				<div class="post_head_box">
					<p>Additional Feature</p>
				</div>

				<div class="check_inner_box">

					<div>
						<?php
							if(isset($data['2']['gas']) && $data['2']['gas'] == 'Yes'){
						?>
							<input checked  type="checkbox" name="gas" value="gas">
						<?php
							}else{
						?>
							<input   type="checkbox" name="gas" value="gas">
						<?php
							}
						?>
						<label>Gas</label>
					</div>


					<div>

						<?php
							if(isset($data['2']['parking']) && $data['2']['parking'] == 'Yes'){
						?>
							<input checked  type="checkbox" name="parking" value="gas">
						<?php
							}else{
						?>
							<input   type="checkbox" name="parking" value="parking">
						<?php
							}
						?>

						
						<label>Parking</label>
					</div>



					<div>
						<?php
							if(isset($data['2']['lift']) && $data['2']['lift'] == 'Yes'){
						?>
							<input checked  type="checkbox" name="lift" value="gas">
						<?php
							}else{
						?>
							<input   type="checkbox" name="lift" value="lift">
						<?php
							}
						?>

						
						<label>Lift</label>
					</div>


					<div>
						<?php
							if(isset($data['2']['wifi']) && $data['2']['wifi'] == 'Yes'){
						?>
							<input checked  type="checkbox" name="wifi" value="gas">
						<?php
							}else{
						?>
							<input   type="checkbox" name="wifi" value="wifi">
						<?php
							}
						?>
						
						<label>Wi-fi</label>
					</div>


					<div>
						<?php
							if(isset($data['2']['cctv']) && $data['2']['cctv'] == 'Yes'){
						?>
							<input checked  type="checkbox" name="cctv" value="gas">
						<?php
							}else{
						?>
							<input   type="checkbox" name="cctv" value="cctv">
						<?php
							}
						?>
						<label>CCTV</label>
					</div>
				</div>
			</div>


			<!-----DESCRIPTION----->
			<!-----===========---->
			<div class="description_box">

				<div class="post_head_box">
					<p>Write A Description</p>
				</div>

				<div class="desc_innner_box">
					<textarea name="fullDesc"><?php echo (isset($data[2]['fullDesc']) && $data[2]['fullDesc'] != '') ? $data[2]['fullDesc'] :'' ?></textarea>
				</div>
				
			</div>

			<!-----IMAGE UPLOAD----->
			<!-----=============---->

			<div class="upload_img_box">

				<div class="post_head_box">
					<p>Upload Image &nbsp;</p> <p class="error_in"> <?php echo $data[2]['imgError'].$data[2]['imgTypeError'] ?> </p>
				</div>

				<div class="img_container">
				
					<div class="img_element">
						<input name="img1" type="file" id="file-1" accept=".jpg,.jpeg,.png" class="imgUpload" accept="image/*">
						<label for="file-1" id="file-1-preview">
							<?php
							
								if($data[2]['img1'] != ''){
									$img = $data[2]['img1'];
								}else{
									$img = 'imageicon.jpg';
								}
								
								
							?>
							<img src="<?php echo URLROOT.'/public/asset/img/product/'.$img ?>">
							<div>
								<p><i class="fas fa-plus-circle"></i> Add Image</p>
							</div>
						</label>
					</div>




					<?php
						if($data[2]['img2'] != ''){
							$img = $data[2]['img2'];						
							
						}else{
							$img = 'imageicon.jpg';	
							
						}


						if($data[2]['img1'] != ''){
							$disableStatus = '';
						}else{
							$disableStatus = 'disabled';
						}
					?>
					<div class="img_element <?php echo $disableStatus ?>">
						<input  <?php echo $disableStatus ?> name="img2" type="file" id="file-2" class="imgUpload" accept="image/*">
						<label for="file-2" id="file-2-preview">
							
							<img src="<?php echo URLROOT.'/public/asset/img/product/'.$img ?>">
							<div>
								<p><i class="fas fa-plus-circle"></i> Add Image</p>
							</div>
						</label>
					</div>




					<?php
						if($data[2]['img3'] != ''){
							$img = $data[2]['img3'];
						
							
						}else{
							$img = 'imageicon.jpg';
							
							
						}



						if($data[2]['img2'] != ''){
							$disableStatus = '';
						}else{
							$disableStatus = 'disabled';
						}
					?>
					<div class="img_element <?php echo $disableStatus ?>">
						<input <?php echo $disableStatus ?> name="img3" type="file" id="file-3" class="imgUpload" accept="image/*">
						<label for="file-3" id="file-3-preview">
							
							<img src="<?php echo URLROOT.'/public/asset/img/product/'.$img ?>">
							<div>
								<p><i class="fas fa-plus-circle"></i> Add Image</p>
							</div>
						</label>
					</div>




					<?php
						if($data[2]['img4'] != ''){
							$img = $data[2]['img4'];
											
						}else{
							$img = 'imageicon.jpg';	
							
						}



						if($data[2]['img3'] != ''){
							$disableStatus = '';
						}else{
							$disableStatus = 'disabled';
						}
					?>
					<div class="img_element <?php echo $disableStatus ?>">
						<input <?php echo $disableStatus ?> name="img4" type="file" id="file-4" class="imgUpload" accept="image/*">
						<label for="file-4" id="file-4-preview">
						
							<img src="<?php echo URLROOT.'/public/asset/img/product/'.$img ?>">
							<div>
								<p><i class="fas fa-plus-circle"></i> Add Image</p>
							</div>
						</label>
					</div>





					<?php
						if($data[2]['img5'] != ''){
							$img = $data[2]['img5'];
											
						}else{
							$img = 'imageicon.jpg';	
							
						}



						if($data[2]['img4'] != ''){
							$disableStatus = '';
						}else{
							$disableStatus = 'disabled';
						}
					?>
					<div class="img_element <?php echo $disableStatus ?>">
						<input <?php echo $disableStatus ?> name="img5" type="file" id="file-5" class="imgUpload" accept="image/*">
						<label for="file-5" id="file-5-preview">
						
							<img src="<?php echo URLROOT.'/public/asset/img/product/'.$img ?>">
							<div>
								<p><i class="fas fa-plus-circle"></i> Add Image</p>
							</div>
						</label>
					</div>


				</div>

				<div class="notice_box">
					<p>(You must upload at least one photo)</p>
				</div>


			</div>

			<input class="submit_post_btn" type="submit" Value="Submit Post">

		</form>

	</div>
</section>


<script src="<?php echo URLROOT.'/public/asset/js/upload.js'?>"></script>

<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>