<?php
	include "header.php";
?>
		
		<!-- main content -->
		<div class="cr-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="cr-page-title cr-page-title-2">
					<div class="cr-breadcrumb">
						<h5>Category</h5>
						<ul>
							<li><a href="index.html">Carrot</a></li>
							<li>Category</li>
						</ul>
					</div>
				</div>
				<div class="row cr-category">	
				<h3>Add New Category</h3>
					<form action="index.php?act=addcategory" method="post">
						<div class="form-group">
							<label>Category Code</label>
							<div class="col-12">
								<input id=""  name="idcategory" 
									class="form-control here slug-title" value="Auto" type="text" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label>Name Category</label>
							<div class="col-12">
								<input id=""  name="namecategory" 
									class="form-control here slug-title" type="text">
							</div>
						</div>


						<div class="row">
							<div class="col-12 d-flex">
								<input type="submit" name="themmoi" class="cr-btn-primary" value="Submit"> 
							</div>
						</div>
						<div class="notification">
							<?php
							if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
							?>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
	include "footer.php";
?>