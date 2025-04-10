<h2>Order Details</h2>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orderDetails as $detail) { ?>
            <tr>
                <td><?= $detail['idproduct'] ?></td>
                <td><?= $detail['quantity'] ?></td>
                <td><?= $detail['price'] ?> VND</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
