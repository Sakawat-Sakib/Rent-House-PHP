<?php 
	require(APPROOT.'/views/admin/header.php');
?>

<section class="admn ">
	

	<div class="all_post_box box">
		<div class="title_box">
				<p class="title_p">Messages</p>
				<i class="far fa-comment-alt"></i>
		</div>

		<div class="table_box">

			<table>
				<thead>
					<th>ID</th>
					<th>User ID</th>
					<th>Date</th>
					
					<th></th>
				</thead>
				<tbody>

					<tr>
						<td data-label="ID">01</td>
						<td data-label="User ID">122</td>
						<td data-label="Date">21-06-21</td>
						
						<td>
							<a class="details" href="#">Details</a>
							<a class="delete" href="#">Delete</a>
						</td>
					</tr>

					<tr>
						<td data-label="ID">02</td>
						<td data-label="User ID">342</td>
						<td data-label="Date">12-06-21</td>
						
						<td>
							<a class="details" href="#">Details</a>
							<a class="delete" href="#">Delete</a>
						</td>
					</tr>
				

					
					
					
				</tbody>
			</table>

		</div>
	</div>

</section>



<div class="post_details_box">
	<p class="logo_text_p">Bashalagbe.com</p>

	<div class="title_box user_info_title_box">
		<div>
			<p class="title_p">User Info</p>
			<i class="far fa-user"></i>
			<p class="title_p">#322</p>
		</div>
		<div>
			<i class="far fa-clock"></i>
			<p class="title_p">12-02-21</p>
		</div>
	</div>

	<div class="seller_box">
		<p>Name : Sakawat Hossain Sakib</p>
		<p>Mobile : 01864881765</p>
		<p>Email : mdsakawatsakib@gmail.com</p>
	</div>

	<div class="title_box">
		<p class="title_p">Message</p>
		<i class="far fa-comment-alt"></i>
		<p class="title_p">#4322</p>

	</div>
	

	<div class="details_desc_box">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>	
	</div>

	

	<i class="fas fa-times details_cross_icon"></i>
</div>

<script src="<?php echo URLROOT.'/asset/admin/js/detailsbox.js'?>" type="text/javascript"></script>
<?php 
	require(APPROOT.'/views/admin/footer.php');
?>

