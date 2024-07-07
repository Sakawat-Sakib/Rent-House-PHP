<?php 
	require(APPROOT.'/views/admin/header.php');
?>

<section class="admn locations">
	<div class="add_location_box box">
		<div class="title_box">
			<p class="title_p">Add District</p>
			<i class="fas fa-map-marker-alt"></i>
		</div>
		<div class="location_form_box">

			<form method="POST" action="<?php echo URLROOT.'/admin/locations' ?>">
				<input type="text" name="location" placeholder="i.e Chittagong">
				<p class="error_p"><?php echo $data[1]['locationError'] ?></p>
				<input type="submit" value="Submit">
			</form>

		</div>
	</div>

	<div class="all_location_box box">
		<div class="title_box">
			<p class="title_p">All Districts</p>
			<i class="fas fa-globe-americas"></i>
		</div>

		<div class="table_box">

			<table>
				<thead>
					<th>ID</th>
					<th>Districts</th>
					<th></th>
				</thead>
				<tbody>
					<?php 
						foreach ($data[0] as $loc) {
					
					?>
					<tr>
						<td><?php echo $loc['id'] ?></td>
						<td><?php echo $loc['location'] ?></td>
						<td>
							<?php
								$status = $loc['status'];
								if($status == 0){
									$stsClass = 'deactiveBtn';
									$btnText = 'Deactive';
								}else if($status == 1){
									$stsClass = 'activeBtn';
									$btnText = 'Active';
								}
							?>
							<a data-id="<?php echo $loc['id'] ?>" data-table="locations" class="<?php echo $stsClass ?> statusBtn" href="#" onclick="changeStatus(this)"><?php echo $btnText ?></a>
							<a data-id="<?php echo $loc['id'] ?>" data-table="locations" data-col="location" class="edit" href="#" onclick="editData(this)">Edit</a>
							<a data-id="<?php echo $loc['id'] ?>" data-table="locations" class="delete" href="#" onclick="deleteData(this)">Delete</a>
						</td>
					</tr>
					<?php
						}
					?>
					
				</tbody>
			</table>

		</div>
	</div>

	<div class="admn_edit_box">
		<i class="fas fa-times edit_box_cross"></i>

		<div class="edit_title_box">
			<p class="title_p">Edit District</p>
			<i class="far fa-edit"></i>
		</div>

		<div class="edit_form_box">
			
		</div>
	</div>

</section>

<script src="<?php echo URLROOT.'/asset/admin/js/editbox.js'?>" type="text/javascript"></script>
<?php 
	require(APPROOT.'/views/admin/footer.php');
?>

