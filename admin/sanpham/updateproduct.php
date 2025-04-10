<?php
include "header.php";
    if(is_array($product)){
        extract($product);
    }
    $imgproductpath="../upload/".$img;
    if(is_file($imgproductpath)){
        $img="<img src='".$imgproductpath."' height='100' width='100'>";
    } else {
        $img="No photo";
    }
?>

		<!-- main content -->
        <div class="cr-main-content">
            <div class="container-fluid">
                <!-- Page title & breadcrumb -->
                <div class="cr-page-title cr-page-title-2">
                    <div class="cr-breadcrumb">
                        <h5>Product Update</h5>
                        <ul>
                            <li><a href="index.html">Carrot</a></li>
                            <li>Product Update</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="cr-card card-default product-list">
                            <div class="cr-card-content">
                                <div class="table-responsive">
									<form action="index.php?act=updateproduct" method="post" enctype="multipart/form-data">
										<div class="card p-4 shadow-sm">
											<!-- Category Selection -->
											<div class="form-group mb-3">
												<label for="idcategory" class="form-label">Category</label>
												<select name="namecategory" class="form-select">
													<option value="0" selected>All Category</option>
													<a href="index.php?act=addproduct" class="btn btn-primary">Add</a>
													<?php
													foreach ($listcategory as $category) {
														extract($category);
														$s = ($idcategory == $product['idcategory']) ? "selected" : "";
														echo '<option value="'.$idcategory.'" '.$s.'>'.$namecategory.'</option>';
													}
													?>
												</select>
											</div>

											<!-- Product Name -->
											<div class="form-group row mb-3">
												<label for="nameproduct" class="col-sm-3 col-form-label">Name Product</label>
												<div class="col-sm-9">
													<input type="text" name="nameproduct" value="<?php if(isset($nameproduct) && $nameproduct != '') echo $nameproduct; ?>" id="nameproduct" class="form-control">
												</div>
											</div>

											<!-- Product Image -->
											<div class="form-group row mb-3">
												<label for="img" class="col-sm-3 col-form-label">Image</label>
												<div class="col-sm-9">
													<input type="file" name="img" value="<?php if(isset($img) && $img != '') echo $img; ?>" id="img" class="form-control">
													<?= $img ?>
												</div>
											</div>

											<!-- Price -->
											<div class="form-group row mb-3">
												<label for="price" class="col-sm-3 col-form-label">Price</label>
												<div class="col-sm-9">
													<input type="text" name="price" value="<?php if(isset($price) && $price != '') echo $price; ?>" id="price" class="form-control">
												</div>
											</div>

											<!-- Old Price -->
											<div class="form-group row mb-3">
												<label for="priceold" class="col-sm-3 col-form-label">Price Old</label>
												<div class="col-sm-9">
													<input type="text" name="priceold" value="<?php if(isset($priceold) && $priceold != '') echo $priceold; ?>" id="priceold" class="form-control">
												</div>
											</div>

											<!-- Product Description -->
											<div class="form-group row mb-3">
												<label for="descriptionproduct" class="col-sm-3 col-form-label">Description</label>
												<div class="col-sm-9">
													<input type="text" name="descriptionproduct" value="<?php if(isset($descriptionproduct) && $descriptionproduct != '') echo $descriptionproduct; ?>" id="descriptionproduct" class="form-control">
												</div>
											</div>

											<!-- Quantity -->
											<div class="form-group row mb-3">
												<label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
												<div class="col-sm-9">
													<input type="number" name="quantity" value="<?php if(isset($quantity) && $quantity != '') echo $quantity; ?>" id="quantity" class="form-control">
												</div>
											</div>

											<!-- Color -->
											<div class="form-group row mb-3">
												<label for="color" class="col-sm-3 col-form-label">Color</label>
												<div class="col-sm-9">
													<input type="text" name="color" value="<?php if(isset($color) && $color != '') echo $color; ?>" id="color" class="form-control">
												</div>
											</div>

											<!-- Screen Size -->
											<div class="form-group row mb-3">
												<label for="screensize" class="col-sm-3 col-form-label">Screen Size</label>
												<div class="col-sm-9">
													<input type="text" name="screensize" value="<?php if(isset($screensize) && $screensize != '') echo $screensize; ?>" id="screensize" class="form-control">
												</div>
											</div>

											<!-- RAM -->
											<div class="form-group row mb-3">
												<label for="ram" class="col-sm-3 col-form-label">RAM</label>
												<div class="col-sm-9">
													<input type="text" name="ram" value="<?php if(isset($ram) && $ram != '') echo $ram; ?>" id="ram" class="form-control">
												</div>
											</div>

											<!-- RAM -->
											<div class="form-group row mb-3">
												<label for="views" class="col-sm-3 col-form-label">Views</label>
												<div class="col-sm-9">
													<input type="text" name="views" value="<?php if(isset($views) && $views != '') echo $views; ?>" id="views" class="form-control">
												</div>
											</div>

											<!-- Release Date -->
											<div class="form-group row mb-3">
												<label for="releasedate" class="col-sm-3 col-form-label">Release Date</label>
												<div class="col-sm-9">
													<input type="date" name="releasedate" value="<?php if(isset($releasedate) && $releasedate != '') echo $releasedate; ?>" id="releasedate" class="form-control">
												</div>
											</div>

											<!-- Hidden Input for Product ID -->
											<div class="form-group">
												<input type="hidden" name="idproduct" value="<?php if(isset($idproduct) && ($nameproduct > 0)) echo $idproduct; ?>">
											</div>

											<!-- Form Actions -->
											<div class="form-actions">
												<div class="d-flex gap-2">
													<input type="submit" name="updateproduct" value="Update" class="btn btn-primary">
													<input type="reset" value="Reset" class="btn btn-secondary">
													<a href="index.php?act=listproduct" class="btn btn-dark">List</a>
												</div>
											</div>
										</div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Footer -->
<?php
	include "footer.php";
?>