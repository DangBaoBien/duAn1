<?php
    if(is_array($category)){
        extract($category);
    }
	include "header.php";
?>

		<!-- main content -->
		<div class="cr-main-content">
		<div class="container-fluid">
			<!-- Page title & breadcrumb -->
			<div class="page-header">
				<div class="cr-breadcrumb">
					<h5>Category List</h5>
				</div>
			</div>

			<div class="form-container">
				<form action="index.php?act=updatecategory" method="post">
					<!-- Row for ID-Category -->
					<div class="form-group row mb-3">
						<label for="idcategory" class="col-sm-3 col-form-label">ID-Category</label>
						<div class="col-sm-9">
							<input type="text" name="idcategory" id="idcategory" class="form-control" disabled>
						</div>
					</div>

					<!-- Row for Name Category -->
					<div class="form-group row mb-3">
						<label for="namecategory" class="col-sm-3 col-form-label">Name Category</label>
						<div class="col-sm-9">
							<input type="text" name="namecategory" 
								value="<?php if(isset($namecategory) && $namecategory != '') echo $namecategory; ?>" 
								id="namecategory" class="form-control">
						</div>
					</div>

					<!-- Hidden input -->
					<div class="form-group">
						<input type="hidden" name="idcategory" 
							value="<?php if(isset($idcategory) && ($namecategory > 0)) echo $idcategory; ?>">
					</div>

					<!-- Buttons -->
					<div class="form-actions">
						<div class="d-flex gap-2">
							<input type="submit" name="updatecategory" value="Update" class="btn btn-primary">
							<input type="reset" value="Reset" class="btn btn-secondary">
							<a href="index.php?act=listcategory" class="btn btn-dark">List</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	include "footer.php";
?>