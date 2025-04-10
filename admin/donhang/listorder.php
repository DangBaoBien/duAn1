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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">Full Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Products</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $count = 0;
                foreach ($orders_with_details as $order) {
                    $count++;
                    $products = "";
                    $editorder = "index.php?act=editorder&idorder=" . $order['idorder'];
                    $deleteorder = "index.php?act=deleteorder&idorder=" . $order['idorder'];

                    // Lấy danh sách sản phẩm từ chi tiết đơn hàng
                    foreach ($order['details'] as $detail) {
                        $products .= " - ". $detail['nameproduct'] . " <br>(" . $detail['quantity'] . " x " . $detail['price'] . "$)<br>";
                    }

                    echo '<tr>
                <td>'.$count.'</td>
                <td>' . $order['fullname'] . '</td>
                <td>' . $order['address'] . ', ' . $order['name_ward'] . ', ' . $order['name_district'] . ', ' . $order['name_province'] . '</td>
                <td>' . $order['phone'] . '</td>
                <td>' . $order['paymentmethod'] . '</td>
                <td>' . $order['status'] . '</td>
                <td>' . $order['orderdate'] . '</td>
                <td>' . $order['subtotal'] . ' $</td>
                <td>' . $products . '</td>
                            <td>
                                <!-- Dropdown for Edit and Delete actions -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="actionDropdown' . $editorder . '" data-bs-toggle="dropdown" aria-expanded="false">
										<span class="sr-only"><i
											class="ri-settings-3-line"></i></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $editorder . '">   
                                        <li><a class="dropdown-item" href="' . $deleteorder . '">Delete</a></li>
                                        <li><a class="dropdown-item" href="' . $editorder . '">Update</a></li>
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