<?php
if (is_array($order)) {
    extract($order);
}
?>
<?php include "header.php"; ?>

<div class="cr-main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="cr-breadcrumb">
                <h5>Update Order</h5>
            </div>
        </div>

        <div class="form-container">
            <form action="index.php?act=updateorder" method="post">
                <!-- Order ID (Readonly) -->
                <div class="form-group row mb-3">
                    <label for="idorder" class="col-sm-3 col-form-label">Order ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="idorder" id="idorder" class="form-control" 
                               value="<?php echo $idorder; ?>" readonly>
                    </div>
                </div>

                <!-- Status Dropdown -->
                <div class="form-group row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="status" id="status" class="form-select">
                            <option value="Pending" <?php echo ($status == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="Confirmed" <?php echo ($status == 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="Pending Shipment" <?php echo ($status == 'Pending Shipment') ? 'selected' : ''; ?>>Pending Shipment</option>
                            <option value="In Transit" <?php echo ($status == 'In Transit') ? 'selected' : ''; ?>>In Transit</option>
                            <option value="Delivered" <?php echo ($status == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                            <option value="Cancelled" <?php echo ($status == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="form-actions">
                    <div class="d-flex gap-2">
                        <input type="submit" name="updateorder" value="Update" class="btn btn-primary">
                        <a href="index.php?act=listorder" class="btn btn-dark">Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
