<?php 
	require(APPROOT.'/views/admin/header.php');
	
?>

<section class="admn">
	<div class="add_category_box box">
		<div class="title_box">
			<p class="title_p">Add Category</p>
			<i class="fas fa-list-ul"></i>
		</div>
		<div class="category_form_box">
			<form method="POST" action="<?php echo URLROOT.'/admin/category' ?>">
				<input type="text" name="category" placeholder="i.e Apartment">
				<p class="error_p"><?php echo $data[1]['categoryError'] ?></p>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>

	<div class="all_category_box box">
		<div class="title_box">
			<p class="title_p">All Categories</p>
			<i class="fas fa-clipboard-list"></i>
		</div>

		<div class="table_box">

			<table>
				<thead>
					<th>ID</th>
					<th>Category</th>
					<th></th>
				</thead>
				<tbody>
					<?php 
						foreach ($data[0] as $cat) {
					?>
					<tr>
						<td><?php echo $cat['id'] ?></td>
						<td><?php echo $cat['category'] ?></td>
						<td>
							<?php
								$status = $cat['status'];
								if($status == 0){
									$stsClass = 'deactiveBtn';
									$btnText = 'Deactive';
								}else if($status == 1){
									$stsClass = 'activeBtn';
									$btnText = 'Active';
								}
							?>
							<a data-id="<?php echo $cat['id'] ?>" data-table="categories" class="<?php echo $stsClass ?> statusBtn" href="#" onclick="changeStatus(this)" ><?php echo $btnText ?></a>
							<a data-id="<?php echo $cat['id'] ?>" data-table="categories" data-col="category" class="edit" href="#" onclick="editData(this)">Edit</a>
							<a data-id="<?php echo $cat['id'] ?>" data-table="categories" class="delete" href="#" onclick="deleteData(this)">Delete</a>
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
			<p class="title_p">Edit Category</p>
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

