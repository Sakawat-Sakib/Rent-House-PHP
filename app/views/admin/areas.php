<?php 
	require(APPROOT.'/views/admin/header.php');
?>

<section class="admn category">
	<div class="add_category_box box">
		<div class="title_box">
			<p class="title_p">Add Area</p>
			<i class="fas fa-map-marked-alt"></i>
		</div>
		<div class="area_form_box">

			<form method="POST" action="<?php echo URLROOT.'/admin/areas' ?>">

				<select name="loc_id">

					<option selected disabled>*Select District</option>

					<?php
						foreach ($data[0] as $loc) {
						
					?>

					<option value="<?php echo $loc['id'] ?>" ><?php echo $loc['location'] ?></option>

					<?php
						}
					?>
	
				</select>
				<p class="error_p"><?php echo $data[1]['locationIdError'] ?></p>

				<input type="text" name="area" placeholder="i.e Chandgaon">
				<p class="error_p"><?php echo $data[1]['areaError'] ?></p>

				<input type="submit" value="Submit">

			</form>

		</div>
	</div>

	<div class="all_area_box box">
		<div class="title_box title_with_option">
			<div class="title_icon_box">
				<p class="title_p">All Areas</p>
				<i class="fas fa-map-marked"></i>
			</div>
			<div class="select_box">

				<select class="selected_location">
					<option selected disabled>*Select District</option>
				
					<?php
						foreach ($data[0] as $loc) {
						
					?>
					<option value="<?php echo $loc['id'] ?>" ><?php echo $loc['location'] ?></option>
					<?php
						}
					?>
				</select>

			</div>
			
		</div>

		<div class="table_box">

			<table>
				<thead>
					<th>ID</th>
					<th>District</th>
					<th>Areas</th>
					
					<th></th>
				</thead>
				<tbody id="area_table">
					<?php
						foreach ($data[2] as $area) {
						
					?>
					<tr>
						<td><?php echo $area['id'] ?></td>
						<td><?php echo $area['location'] ?></td>
						<td><?php echo $area['area'] ?></td>
						
						<td>
							<?php
								$status = $area['status'];
								if($status == 0){
									$stsClass = 'deactiveBtn';
									$btnText = 'Deactive';
								}else if($status == 1){
									$stsClass = 'activeBtn';
									$btnText = 'Active';
								}
							?>
							<a data-id="<?php echo $area['id'] ?>" data-table="areas" class="<?php echo $stsClass ?> statusBtn" href="#" onclick="changeStatus(this)"><?php echo $btnText ?></a>
							<a data-id="<?php echo $area['id'] ?>" data-table="areas" data-col="area" class="edit" href="#" onclick="editData(this)">Edit</a>
							<a data-id="<?php echo $area['id'] ?>" data-table="areas" class="delete" href="#" onclick="deleteData(this)">Delete</a>
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
			<p class="title_p">Edit Area</p>
			<i class="far fa-edit"></i>
		</div>

		<div class="edit_form_box">
			<form>
				<input type="text" value="Chandgaon">
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>

</section>

<script src="<?php echo URLROOT.'/asset/admin/js/editbox.js'?>" type="text/javascript"></script>
<script src="<?php echo URLROOT.'/asset/admin/js/select.js'?>" type="text/javascript"></script>
<?php 
	require(APPROOT.'/views/admin/footer.php');
?>

