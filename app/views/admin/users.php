<?php 
	require(APPROOT.'/views/admin/header.php');
?>


<section class="admn">
	

	<div class="all_post_box box">
		<div class="title_box">
				<p class="title_p">All Users</p>
				<i class="fas fa-users"></i>
		</div>

		<div class="table_box">

			<table>
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					
					
					<th>Added On</th>
					<th></th>
				</thead>
				<tbody>
					<?php
						foreach ($data as $user) {
						
					?>
					<tr>
						<td data-label="ID"><?php echo $user['id']?></td>
						<td data-label="Name"><?php echo $user['name']?></td>
						<td data-label="Email"><?php echo $user['email']?></td>
						
					
						<td data-label="Added On"><?php echo $user['added_on']?></td>
						
						<td>
							<?php
								$status = $user['blocked'];
								if($status == 0){
									$stsClass = 'unblock';
									$btnText = 'Unblocked';
								}else if($status == 1){
									$stsClass = 'block';
									$btnText = 'Blocked';
								}
							?>
							<a data-id="<?php echo $user['id'] ?>" class="<?php echo $stsClass ?> stateBtn" href="#"><?php echo $btnText ?></a>
							
							<a data-id="<?php echo $user['id'] ?>" data-table="users" class="delete" href="#" onclick="deleteData(this)">Delete</a>
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




<script src="<?php echo URLROOT.'/asset/admin/js/block.js'?>" type="text/javascript"></script>
<?php 
	require(APPROOT.'/views/admin/footer.php');
?>

