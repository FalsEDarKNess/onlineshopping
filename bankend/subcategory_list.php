<?php 
session_start();
if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {
include 'include/header.php';
include 'dbconnect.php';

?>


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory List</h1>
		<a href="subcategory_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Subcategory</a>
	</div>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Subcategory Name</th>
							<th>Category</th>
							<th>Option</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Subcategory Name</th>
							<th>Category</th>
							<th>Option</th>
						</tr>
					</tfoot>
					<tbody>

						<?php
						$sql="SELECT subcategories.*,categories.name as cat_name FROM subcategories,categories WHERE subcategories.category_id=categories.id";
						$stmt=$pdo->prepare($sql);
						$stmt->execute();
						$subcategories=$stmt->fetchAll();
						$j=1;
						foreach ($subcategories as $subcategory) {
							
							?>
						<tr>
							<td><?php echo $j++; ?></td>
							<td><?php echo $subcategory['name']; ?></td>
							<td><?php echo $subcategory['cat_name']; ?></td>
							<td>
								<a href="subcategory_edit.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a> 
								<a href="subcategory_delete.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
							</td>

						</tr>

					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php 

include 'include/footer.php';

}else{
  header("location:../index.php");
}

?>