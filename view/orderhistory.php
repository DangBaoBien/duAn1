<?php
include "header.php";
?>
<style>
    .filter-options {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .filter-options label {
        margin-right: 10px;
        font-weight: bold;
    }

    .filter-select {
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
</style>
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>My Order</h2>
                        <span> <a href="index.php">Home</a> / My Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart -->
<section class="section-cart padding-t-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>My Order</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <form method="GET" action="index.php" id="filterForm">
                        <input type="hidden" name="act" value="orderhistory">
                        <div class="filter-options mb-3">
                            <label for="status">Filter by Status:</label>
                            <select name="status" id="status" class="filter-select" onchange="document.getElementById('filterForm').submit();">
                                <option value="">All</option>
                                <option value="Pending" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="Confirmed" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                                <option value="Pending Shipment" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Pending Shipment') ? 'selected' : ''; ?>>Pending Shipment</option>
                                <option value="In Transit" <?php echo (isset($_GET['status']) && $_GET['status'] === 'In Transit') ? 'selected' : ''; ?>>In Transit</option>
                                <option value="Delivered" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                                <option value="Cancelled" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                    </form>

                    <div class="cr-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Delivery Address</th>
                                    <th>Product</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <?php
                                    $order_details = load_order_details_by_idorder($order['idorder']);
                                    ?>
                                    <tr>
                                        <td>#<?php echo $order['idorder']; ?></td>
                                        <td><?php echo $order['orderdate']; ?></td>
                                        <td>
                                            <?php echo $order['address'] . ', ' . $order['name_ward'] . ', ' . $order['name_district'] . ', ' . $order['name_province']; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($order_details as $detail): ?>
                                                <div class="product-item">
                                                    <span><img class="mb-1" src="upload/<?= $detail['img'] ?>" width="50px" alt="<?php echo $detail['nameproduct']; ?>"></span>
                                                    <span><?php echo $detail['nameproduct']; ?> (x<?php echo $detail['quantity']; ?>)</span>
                                                </div>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>$<?php echo $order['subtotal']; ?></td>
                                        <td><?php echo $order['status']; ?></td>
                                        <td>
                                            <?php if ($order['status'] === 'Pending'): ?>
                                                <form action="index.php?act=cancelorder" method="POST" style="display:inline;">
                                                    <input type="hidden" name="idorder" value="<?php echo $order['idorder']; ?>">
                                                    <button type="submit" class="cr-button-danger" onclick="return confirmCancel();">Cancel</button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="cr-cart-total mb-3 mt-3">
                            <div class="total mb-3">
                                <button class="cr-button "><a style="color: #FFF;" href="index.php">Continue Shopping</a></button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
<script>
    function confirmCancel() {
        return confirm('Are you sure you want to cancel this order?');
    }
</script>