<?php
	include "header.php";
?>
		<!-- main content -->
		<div class="cr-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="cr-page-title cr-page-title-2">
					<div class="cr-breadcrumb">
						<h5>Product List</h5>
						<ul>
							<li><a href="index.html">Carrot</a></li>
							<li>Product List</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="cr-card card-default product-list">
							<div class="cr-card-content">
								<div class="table-responsive">
									<form action="index.php?act=listproduct&idproduct" method="post" class="mb-4">
										<div class="d-flex justify-content-between align-items-center mb-3">
											<!-- Category Filter -->
											<div class="search">
												<select name="idcategory" class="form-select w-auto" aria-label="Select Category">
													<option value="0" selected>All Category</option>
													<?php
													foreach ($listcategory as $category) {
														extract($category);
														// So sánh đúng giá trị của $idcategory với $id sản phẩm hiện tại
														$s = ($idcategory == $product['idcategory']) ? "selected" : ""; // Thay thế $idproduct thành $product['idcategory']
														echo '<option value="'.$idcategory.'" '.$s.'>'.$namecategory.'</option>';
													}
													?>   
												</select>
											</div>
											<!-- Search Bar -->
											<div class="input-group w-auto">
												<input type="text" class="form-control" name="kyw" placeholder="Search Product" aria-label="Search Product">
												<button type="submit" value="GO" name="listok" class="btn btn-primary">GO</button>
											</div>
										</div>
									</form>

									<!-- Product Table -->
									<table class="table table-bordered table-striped">
										<thead class="thead-light">
											<tr>
												<th>Img</th>
												<th>Name</th>
												<th>Price</th>
												<th>Price Old</th>
												<th>Quantity</th>
												<th>Color</th>
												<th>Screen Size</th>
												<th>RAM</th>
												<th>Release Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($listproduct as $product) {
												extract($product);
												$editproduct = "index.php?act=editproduct&idproduct=".$idproduct;
												$deleteproduct = "index.php?act=deleteproduct&idproduct=".$idproduct;
												$img = "../upload/".$img;
												if (is_file($img)) {
													$img = "<img src='".$img."' width='50' height='50'>";
												} else {
													$img = "No photo";
												}
												echo '<tr>
														<td>'.$img.'</td>
														<td>'.$nameproduct.'</td>
														<td>'.$price.'</td>
														<td>'.$priceold.'</td>
														<td>'.$quantity.'</td>
														<td>'.$color.'</td>
														<td>'.$screensize.'</td>
														<td>'.$ram.'</td>
														<td>'.$releasedate.'</td>
														<td>
															<!-- Dropdown for Edit and Delete actions -->
															<div class="dropdown">
																<button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="actionDropdown' . $idproduct . '" data-bs-toggle="dropdown" aria-expanded="false">
																	<i class="ri-settings-3-line"></i>
																</button>
																<ul class="dropdown-menu" aria-labelledby="actionDropdown' . $idproduct. '">
																	<li><a class="dropdown-item" href="' . $editproduct . '">Edit</a></li>
																	<li><a class="dropdown-item" href="' . $deleteproduct . '">Delete</a></li>
																</ul>
															</div>
														</td>
													</tr>';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="index.php?act=addproduct" class="btn btn-primary">Add</a>
		</div>
		<?php
	include "footer.php";
?>