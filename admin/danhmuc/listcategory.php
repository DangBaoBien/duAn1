<?php
	include "header.php";
?>
		<!-- main content -->
		<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5>Category List</h5>
                <ul>
                    <li><a href="index.html">Carrot</a></li>
                    <li>Category List</li>
                </ul>
            </div>
        </div>
        
        <!-- Add category button -->
        <a href="index.php?act=addcategory" class="btn btn-primary mb-3">Add</a>

        <!-- Category table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">ID-Category</th>
                    <th scope="col">Name-Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($listcategory as $category) {
                    $total++;
                    extract($category);
                    $editcategory = "index.php?act=editcategory&idcategory=" . $idcategory;
                    $deletecategory = "index.php?act=deletecategory&idcategory=" . $idcategory;
                    echo '<tr>
                            <td>' . $total . '</td> 
                            <td>' . $idcategory . '</td>
                            <td>' . $namecategory . '</td>
                            <td>
                                <!-- Dropdown for Edit and Delete actions -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="actionDropdown' . $idcategory . '" data-bs-toggle="dropdown" aria-expanded="false">
										<span class="sr-only"><i
											class="ri-settings-3-line"></i></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $idcategory . '">
                                        <li><a class="dropdown-item" href="' . $editcategory . '">Edit</a></li>
                                        <li><a class="dropdown-item" href="' . $deletecategory . '">Delete</a></li>
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
<?php
	include "footer.php";
?>