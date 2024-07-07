<?php 
	require(APPROOT.'/views/userpanel/includes/header.php');
?>

<section>
	<div class="container">
		
	
		<div class="profile_box">

			<div class="profile">

				<div class="user_info">
					<i class="fas fa-user-circle"></i>
					<h1><?php echo explode(" ",$_SESSION['name'])[0] ?></h1>
					<p>User ID : <?php echo $_SESSION['user_id']?></p>
					<p><?php echo $_SESSION['email']?></p>
					<a class="logoutBtn" href="<?php echo URLROOT.'/users/logout'?>">Logout</a>
					<input type="hidden" class="uid" value="<?php echo $_SESSION['user_id']?>">
				</div>

				<div class="ad_filter">

					<div>
						<i class="fas fa-check"></i><button data-id="<?php echo $_SESSION['user_id'] ?>" onclick="approvedAds(this)">Approved Ads</button>
					</div>
					<div>
						<i class="fas fa-sync-alt"></i><button data-id="<?php echo $_SESSION['user_id'] ?>" onclick="pendingAds(this)">Pending Ads</button>
					</div>
					
					
				</div>

			</div>

		
			<div class="product_box" id="user_ad_list">

			


				<div class="notfound_box">
					<i class="far fa-newspaper"></i>
					<p>"Select a option from the bottom-left"</p>
				</div>
				

			</div>
				
			

		</div>


	</div>
</section>

<script src="<?php echo URLROOT.'/public/asset/js/userad.js'?>"></script>
<?php
	require(APPROOT.'/views/userpanel/includes/footer.php');
?>