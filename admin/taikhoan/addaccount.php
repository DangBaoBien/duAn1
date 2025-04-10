<?php include "header.php"; ?>
		
		<!-- main content -->
		<div class="cr-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="cr-page-title cr-page-title-2">
					<div class="cr-breadcrumb">
						<h5>Account</h5>
						<ul>
							<li><a href="index.html">Carrot</a></li>
							<li>Account</li>
						</ul>
					</div>
				</div>
				<div class="row cr-category">	
				<h3>Add New Account</h3>
					<form action="index.php?act=addaccount" method="post">
						<!-- <div class="form-group">
							<label>Category Code</label>
							<div class="col-12">
								<input id=""  name="idcategory" 
									class="form-control here slug-title" type="text" disabled>
							</div>
						</div> -->
						
						<div class="form-group">
							<label>Fullname</label>
							<div class="col-12">
								<input id=""  name="fullname" 
									class="form-control" type="text">
							</div>
						</div>

						<div class="form-group">
							<label>Email</label>
							<div class="col-12">
								<input name="email" class="form-control here set-slug"
									type="email">
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="col-12">
								<input name="password" class="form-control here set-slug"
									type="password">
							</div>
						</div>
						<div class="form-group">
                            <label>Role</label>
                            <div class="col-12">
                                <select name="role*" required class="form-control" aria-label=".form-select-sm">
                                    <option value="" disabled selected>Selected Role</option>
                                    <option value="0">Customer</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
						</div>

						<!-- <div class="form-group row">
							<label>Phone</label>
							<div class="col-12">
								<textarea id="" name="sortdescription" cols="40"
									rows="2" class="form-control"></textarea>
							</div>
						</div> -->
<!-- 
						<div class="form-group row">
							<label>Full Description</label>
							<div class="col-12">
								<textarea id="" name="fulldescription" cols="40"
									rows="4" class="form-control"></textarea>
							</div>
						</div> -->
						<div class="row">
							<div class="col-12 d-flex">
								<input type="submit" name="themmoiacc" class="cr-btn-primary" value="Submit"> 
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
		<!-- Footer -->
		<?php include "footer.php"; ?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Name); // Gán Name vào value
    }
    citis.onchange = function () {
        districts.length = 1; // Xóa các tùy chọn cũ
        wards.length = 1;
        if (this.value !== "") {
            const result = data.filter((n) => n.Name === this.value); // So sánh Name thay vì Id
            for (const k of result[0].Districts) {
                districts.options[districts.options.length] = new Option(k.Name, k.Name); // Gán Name
            }
        }
    };
    districts.onchange = function () {
        wards.length = 1;
        const dataCity = data.filter((n) => n.Name === citis.value); // So sánh Name
        if (this.value !== "") {
            const dataWards = dataCity[0].Districts.filter((n) => n.Name === this.value)[0].Wards; // So sánh Name
            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Name); // Gán Name
            }
        }
    };
    }


</script>