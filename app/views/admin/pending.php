<?php 
	require(APPROOT.'/views/admin/header.php');
?>

<section class="admn ">
	

	<div class="all_post_box box">
		<div class="title_box">
				<p class="title_p">Pending Posts</p>
				<i class="fas fa-sync-alt"></i>
		</div>

		<div class="table_box">

			<table>
				<thead>
					<th>ID</th>
					<th>User ID</th>
					<th>Category</th>
					<th>Bedroom</th>
					
					<th>Price</th>
					<th>Division</th>
					<th>Date</th>
					<th></th>
				</thead>
				<tbody>

				<?php 
					foreach ($data as $post) {
				?>

					<tr>
						<td data-label="ID"><?php echo $post['id']?></td>
						<td data-label="User ID"><?php echo $post['user_id']?></td>
						<td data-label="Category"><?php echo $post['category']?></td>
						<td data-label="Bedroom"><?php echo $post['bedroom']?></td>
						
						<td data-label="Price"><?php echo $post['price']?></td>
						<td data-label="Division"><?php echo $post['location']?></td>
						<td data-label="Date"><?php echo $post['added_on']?></td>
						<td>
							
							<a data-id="<?php echo $post['id'] ?>" class="acceptBtn" href="#">Accept</a>
							<a data-id="<?php echo $post['id'] ?>" data-table="pending" class="details" href="#">Details</a>
							<a data-id="<?php echo $post['id'] ?>" data-table="pending" class="delete" href="#" onclick="deleteData(this)">Delete</a>
						</td>
					</tr>

				<?php
					}
				?>

					
					
					
				</tbody>
			</table>

		</div>
	</div>

	

</section>



<div class="post_details_box">
	
</div>

<script src="<?php echo URLROOT.'/asset/admin/js/detailsbox.js'?>" type="text/javascript"></script>
<?php 
	require(APPROOT.'/views/admin/footer.php');
?>

