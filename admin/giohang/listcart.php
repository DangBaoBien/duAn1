<?php include "header.php"; ?>

<!-- main content -->
<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5>Shopping Cart List</h5>
                <ul>
                    <li><a href="index.php">Carrot</a></li>
                    <li>Shopping Cart List</li>
                </ul>
            </div>
        </div>

        <!-- Cart Table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cart ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Products</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    $totalGrand = 0;

                    if (!empty($cart_orders)) {
                        foreach ($cart_orders as $cart) {
                            $count++;
                            $totalGrand += $cart['total'];
                            $editcart = "index.php?act=editcart&idcart=" . $cart['idcart'];
                            $deletecart = "index.php?act=deletecart&idcart=" . $cart['idcart'];

                            // Lấy danh sách sản phẩm trong giỏ
                            $products = "";
                            foreach ($cart['details'] as $detail) {
                                $products .= $detail['nameproduct'] . " (" . $detail['quantity'] . " x " . $detail['price'] . " $)<br>";
                            }

                            echo '<tr>
                                <td>' . $count . '</td>
                                <td>' . $cart['idcart'] . '</td>
                                <td>' . $cart['idaccount'] . '</td>
                                <td>' . $cart['fullname'] . '</td>
                                <td>' . $cart['address'] . '</td>
                                <td>' . $cart['phone'] . '</td>
                                <td>' . $cart['total'] . ' $</td>
                                <td>' . $products . '</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="actionDropdown' . $count . '" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-settings-3-line"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $count . '">
                                            <li><a class="dropdown-item" href="' . $deletecart . '">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="10" class="text-center">No carts found!</td></tr>';
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="text-end"><strong>Grand Total:</strong></td>
                        <td colspan="2"><?php echo $totalGrand . ' $'; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "footer.php"; ?>
