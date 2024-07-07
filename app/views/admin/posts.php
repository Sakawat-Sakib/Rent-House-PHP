<?php 
	require(APPROOT.'/views/admin/header.php');
?>

<section class="admn ">
	

	<div class="all_post_box box">
		<div class="title_box">
				<p class="title_p">All Posts</p>
				<i class="far fa-clone"></i>
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
							<?php
								$status = $post['status'];
								if($status == 0){
									$stsClass = 'deactiveBtn';
									$btnText = 'Deactive';
								}else if($status == 1){
									$stsClass = 'activeBtn';
									$btnText = 'Active';
								}
							?>
							<a data-id="<?php echo $post['id'] ?>" data-table="posts" class="<?php echo $stsClass ?> statusBtn" href="#" onclick="changeStatus(this)"><?php echo $btnText ?></a>
							<a data-id="<?php echo $post['id'] ?>" data-table="posts" class="details" href="#">Details</a>
							<a data-id="<?php echo $post['id'] ?>" data-table="posts" class="delete" href="#" onclick="deleteData(this)">Delete</a>
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

