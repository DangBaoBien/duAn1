<?php include "header.php"; ?>

		<!-- main content -->
		<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5>Account List</h5>
                <ul>
                    <li><a href="index.html">Carrot</a></li>
                    <li>Account List</li>
                </ul>
            </div>
        </div>
        
        <!-- Add category button -->
        <!-- <a href="index.php?act=addaccount" class="btn btn-primary mb-3">Add</a> -->

        <!-- Category table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID Account</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address Detail</th>
                    <th scope="col">Ward</th>
                    <th scope="col">Disstrict</th>
                    <th scope="col">Province</th>
                    <th scope="col">Role</th>
                    <th scope="col">Acction</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($listaccount as $account) {
                    $total++;
                    extract($account);
                    $editaccount = "index.php?act=editaccount&idaccount=" . $idaccount;
                    $deleteaccount = "index.php?act=deleteaccount&idaccount=" . $idaccount;
					$roleDisplay = ($role == 0) ? 'Khách hàng' : 'Admin';
                    echo '<tr>
                            <td>' . $total . '</td> 
                            <td>' . $idaccount . '</td>
                            <td>' . $fullname . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $address . '</td>
                            <td>' . $name_ward . '</td>
                            <td>' . $name_district . '</td>
                            <td>' . $name_province . '</td>
                            <td>' . $roleDisplay  . '</td>
                            <td>
                                <!-- Dropdown for Edit and Delete actions -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="actionDropdown' . $idaccount . '" data-bs-toggle="dropdown" aria-expanded="false">
										<span class="sr-only"><i
											class="ri-settings-3-line"></i></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $idaccount . '">   
                                        <li><a class="dropdown-item" href="' . $deleteaccount . '">Delete</a></li>
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

		<!-- Footer -->
		<?php include "footer.php"; ?>
