<?php
include("header.php");

include("include/config.php");


?>


<!-- Blank Start -->
<!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0"> -->
<div class="container-fluid pt-4 px-4">
	<!--------------------- Main Category Table ----------------->
	<h1 style="text-align: center;color:  #5b7c99;">Main Category Table</h1>


	<table class="table">
		<thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
			<tr>

				<th scope="col">Main Categories</th>

				<th scope="col">Update</th>
				<th scope="col">Action</th>
			</tr>
		</thead>


		<?php

		$sql1 = "SELECT * FROM maincate WHERE status='1'";
		$c1 = mysqli_query($db, $sql1);

		while ($cate1 = mysqli_fetch_array($c1)) {

		?>


			<tbody>
				<tr style="text-align: center;">


					<td><?php echo $cate1["maincate"]   ?></td>


					<td>
						<a href="cateEdit.php?transfer=<?php echo $cate1['cate_id']; ?>&type=1">Edit</a>
					</td>
					<td>
						<a href="mcdel.php?pass=<?php echo $cate1['cate_id']; ?>">Delete</a>
					</td>
				</tr>


			</tbody>

		<?php

		};


		?>
	</table>




	<hr style="opacity: 1;" />
	<!------------------- All Category Table ------------------->
	<h1 style="text-align: center;color:  #5b7c99;">Main and Sub Categories Table</h1>


	<table class="table">
		<thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
			<tr>

				<th scope="col">Main Categories</th>
				<th scope="col">Sub-Categories</th>
				<th scope="col">Create Date</th>

				<th scope="col">Update</th>
				<th scope="col">Action</th>
			</tr>
		</thead>


		<?php

		$sql = "SELECT * FROM category2 WHERE status='1'";
		$c = mysqli_query($db, $sql);

		while ($cate = mysqli_fetch_array($c)) {

		?>


			<tbody>
				<tr style="text-align: center;">


					<td><?php echo $cate["maincate"]   ?></td>
					<td><?php echo $cate["subcate"]   ?></td>


					<td><?php echo $cate["createdate"]   ?></td>

					<td>
						<a href="cateEdit.php?transfer=<?php echo $cate['cate_id']; ?>&type=2">Edit</a>
					</td>
					<td>
						<a href="cateDel.php?pass=<?php echo $cate['cate_id']; ?>">Delete</a>
					</td>
				</tr>


			</tbody>

		<?php

		};


		?>
	</table>





</div>
<!-- Blank End -->


<?php
include("footer.php");

?>