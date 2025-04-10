<?php
	include "header.php";
?>
		<!-- main content -->
		<div class="cr-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="cr-page-title cr-page-title-2">
					<div class="cr-breadcrumb">
						<h5>Add Product</h5>
						<ul>
							<li><a href="index.html">Carrot</a></li>
							<li>Add Product</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="cr-card card-default">
							<div class="cr-card-content">
								<div class="row cr-product-uploads">
									
									<div class="col-lg-8">
										<div class="cr-vendor-upload-detail">
										<form class="row g-3" action="index.php?act=addproduct" method="post" enctype="multipart/form-data">
												<div class="col-md-6">
													<label for="inputEmail4" class="form-label">Product name</label>
													<input type="text" class="form-control" id="inputEmail4" name="nameproduct" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Select Categories</label>
													<select class="form-control" name="idcategory" required>
														<option value="">Chọn danh mục</option> <!-- Thêm giá trị mặc định -->
														<?php
														foreach ($listcategory as $category) {
															extract($category);
															echo '<option value="'.$idcategory.'">'.$namecategory.'</option>';
														}
														?>
													</select>
												</div>
												<div class="col-md-6">
													<label class="form-label">Price</label>
													<input type="number" class="form-control" name="price" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Price Old</label>
													<input type="number" class="form-control" name="priceold" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Quantity</label>
													<input type="number" class="form-control" name="quantity" required>
												</div>
												<div class="col-md-12">
													<label class="form-label">Full Detail</label>
													<textarea class="form-control" rows="4" name="descriptionproduct" required></textarea>
												</div>
												<div class="col-md-12">
													<label class="form-label">Image</label>
													<input type="file" class="form-control" name="img" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Color</label>
													<input type="text" class="form-control" name="color" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Screen Size</label>
													<input type="text" class="form-control" name="screensize" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">RAM</label>
													<input type="text" class="form-control" name="ram" required>
												</div>
												<div class="col-md-6">
													<label class="form-label">Release Date</label>
													<input type="date" class="form-control" name="releasedate" required>
												</div>
												<div class="col-md-12">
													<input type="submit" name="submit" class="btn btn-primary" value="Submit" id="">
												</div>
												<div class="ssf">
													<?php
													if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
													?>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	include "footer.php";
?>