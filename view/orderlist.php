<h2>Your Orders</h2>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) { ?>
            <tr>
                <td><?= $order['idorder'] ?></td>
                <td><?= $order['orderdate'] ?></td>
                <td><?= $order['status'] ?></td>
                <td><?= $order['subtotal'] ?> VND</td>
                <td><a href="index.php?act=orderdetails&idorder=<?= $order['idorder'] ?>">View</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
