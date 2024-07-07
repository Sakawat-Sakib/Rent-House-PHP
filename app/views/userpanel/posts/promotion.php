<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
?>

<section class="setViewHeight">
	<div class="container ">

		<div class="promote_main_box">
			<div class="promote_pack_box">

				<div class="pro_top_box">
					<h3>Promote Your Ad</h3>
				</div>
				
				<div class="promote_form">
					<h3>Select one option :</h3>

					<form method="POST" action="<?php echo URLROOT.'/posts/checkout'?>">


						<div class="pack_radio">
							<input class="package" id="topad" value="top" type="radio" name="option">

							<label for="topad">
								<div class="inner_pack">
									<div class="pack_details">
										<h3>Top Ad</h3>
										<ul>
											<li>Get up to 20 times more response!</li>
											<li>Ad will stay on top as well as in regular section!</li>
											<li>Special background will show!</li>
										</ul>
									</div>
									<div class="pack_price">
										<p>Tk 300</p>
									</div>
								</div>
							</label>

						</div>


						<div class="pack_radio">
							<input class="package" id="highlight" value="highlight" type="radio" name="option">
							<label for="highlight">
								<div class="inner_pack">
									<div class="pack_details">
										<h3>Highlight Ad</h3>
										<ul>
											<li>Get up to 10 times more response!</li>
										
											<li>Ad will be highlighted!</li>
										</ul>
									</div>
									<div class="pack_price">
										<p>TK 150</p>
									</div>
								</div>
							</label>
						</div>
						<input type="hidden" name="uid" value="<?php echo $data['user_id']?>">
						<input type="hidden" name="pid" value="<?php echo $data['id']?>">

						<input id="paymentBtn" class="disabled" disabled type="submit" name="" value="Make Payment">
						
					</form>

				</div>

			</div>

			<div class="promote_pay">
				<div class="single_product" id="singlePro">
						<a href="<?php echo URLROOT.'/posts/postdetails/'.$data['id'].'/posts' ?>">
							<div class="product_img">
								<img src="<?php echo URLROOT.'/public/asset/img/product/'.$data['img_1'] ?>">
								
							</div>
							<div class="info_box">
								<h3><?php echo $data['category'] ?></h3>
								<p><?php echo $data['area'] ?> , <?php echo $data['location'] ?></p>
								<p>TK <?php echo $data['price'] ?> /month</p>

								

								
							</div>
						</a>

						<div class="bed_bath_box">
							<div class="bed_box">
								<i class="fas fa-bed"></i>
								<span><?php echo $data['bedroom'] ?></span>
							</div>
							<div class="bath_box">
								<i class="fas fa-tint"></i>
								<span><?php echo $data['bathroom'] ?></span>
							</div>
						</div>
						
				</div>

				<div class="payment_pack">
					<div class="pay_sum">
						<h3>Payment Summary</h3>
						<div class="price">
							<p id="pack_type">--</p>
							<p>TK <span id="sub_price">--</span></p>
						</div>	
					</div>
					<div class="total_pay">
						<p>Total Amount</p>
						<p>TK <span id="total_price">--</span></p>
					</div>

				</div>


				<div class="payment_method">
					<h3>Payment Method :</h3>
					<div class="pay_options">
						<div class="bkash">
							<img src="<?php echo URLROOT.'/asset/img/bkash.png' ?>">
						</div>
						
					</div>
				</div>
			</div>
		</div>


	</div>
</section>


<script src="<?php echo URLROOT.'/public/asset/js/promote.js'?>"></script>
<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>