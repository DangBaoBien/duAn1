<?php
include "header.php";
?>
<!-- Main content -->
<div class="cr-main-content">
	<div class="container-fluid">
		<!-- Page title & breadcrumb -->
		<div class="cr-page-title">
			<div class="cr-breadcrumb">
				<h5>eCommerce</h5>
				<ul>
					<li><a href="index.php">BQS SHOP</a></li>
					<li>eCommerce</li>
				</ul>
			</div>
			<!-- <div class="cr-tools">
				<div id="pagedate">
				</div>
			</div> -->
		</div>
		<div class="row">
			<!-- <div class="">
				<div class="cr-card revenue-overview">
					<div class="cr-card-header header-575">
						<h4 class="cr-card-title">Revenue Overview</h4>
						<div class="header-tools">
							<a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
									class="ri-fullscreen-line"></i></a>
						</div>
					</div>
					<div class="cr-card-content">
						<div class="cr-chart-header">
							<div class="block">
								<h6>Orders</h6>
								<h5>825
									<span class="up"><i class="ri-arrow-up-line"></i>2%</span>
								</h5>
							</div>
							<div class="block">
								<h6>Revenue</h6>
								<h5>$89k
									<span class="up"><i class="ri-arrow-up-line"></i>53%</span>
								</h5>
							</div>
							<div class="block">
								<h6>Expence</h6>
								<h5>$68k
									<span class="down"><i class="ri-arrow-down-line"></i>24%</span>
								</h5>
							</div>
							<div class="block">
								<h6>Profit</h6>
								<h5>$21k
									<span class="up"><i class="ri-arrow-up-line"></i>24%</span>
								</h5>
							</div>
						</div>
						<div class="cr-chart-content">
							<div id="newrevenueChart" class="mb-m-24"></div>

						</div>
					</div>
				</div>
			</div> -->
			<!-- <div class="col-xxl-4 col-xl-6 col-md-12">
				<div class="cr-card" id="campaigns">
					<div class="cr-card-header">
						<h4 class="cr-card-title">Campaigns</h4>
						<div class="header-tools">
							<div class="cr-date-range dots">
								<span></span>
							</div>
						</div>
					</div>
					<div class="cr-card-content">
						<div class="cr-chart-content">
							<div id="newcampaignsChart"></div>
						</div>
						<div class="cr-chart-header-2">
							<div class="block">
								<h6>Social</h6>
								<h5><span class="up">94%<i class="ri-arrow-up-line"></i></span>75k</h5>
							</div>
							<div class="block">
								<h6>Referral</h6>
								<h5><span class="down">96%<i class="ri-arrow-down-line"></i></span>54k</h5>
							</div>
							<div class="block">
								<h6>Organic</h6>
								<h5><span class="up">72%<i class="ri-arrow-up-line"></i></span>2.5k</h5>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="col-xxl-6 col-xl-12">
				<div class="cr-card" id="best_seller_tbl">
					<div class="cr-card-header">
						<h4 class="cr-card-title">Best Seller</h4>
						<div class="header-tools">
							<a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen">
								<i class="ri-fullscreen-line"></i>
							</a>
						</div>
					</div>
					<div class="cr-card-content card-default">
						<div class="best-seller-table">
							<div class="table-responsive">
								<table id="best_seller_data_table" class="table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Product</th>
											<th>Sales</th>
											<th>Total Revenue</th>
										</tr>

									</thead>
									<tbody>
										<?php
										$best_sellers = get_best_sellers();
										foreach ($best_sellers as $product) {
											echo "<tr>
                                    <td><img class='cat-thumb' width='50px' height='50px' src='../upload/{$product['img']}' alt='{$product['nameproduct']} '></td>
                                    <td>{$product['nameproduct']}</td>
                                    <td>{$product['total_quantity']}</td>
                                    <td>$" . number_format($product['total_sales'], 2) . "</td>
                                  </tr>";
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xxl-6 col-xl-12">
				<div class="cr-card" id="top_product_tbl">
					<div class="cr-card-header">
						<h4 class="cr-card-title">Hot Products</h4>
						<div class="header-tools">
							<a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen">
								<i class="ri-fullscreen-line"></i>
							</a>
							<div class="cr-date-range dots">
								<span></span>
							</div>
						</div>
					</div>
					<div class="cr-card-content card-default">
						<div class="top-product-table">
							<div class="table-responsive">
								<table id="top_product_data_table" class="table">
									<thead>
										<tr>
											<th>Image</th>
											<th>Product</th>
											<th>Price</th>
											<th>Views</th>
											<th>Stock</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($all_products as $product) {
											echo "<tr>
                <td>
                    <img class='cat-thumb' src='../upload/{$product['img']}' alt='{$product['nameproduct']}'>
                    
                </td>
                <td>
                    <span class='name'>{$product['nameproduct']}</span>
                </td>
                <td>$" . number_format($product['price'], 2) . "</td>
                <td>{$product['views']}</td>
                <td>{$product['quantity']}</td>
              </tr>";
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		<div class="row">
			<div class="">
				<div class="cr-card" id="ordertbl">
					<div class="cr-card-header">
						<h4 class="cr-card-title">Recent Orders</h4>
						<div class="header-tools">
							<a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
									class="ri-fullscreen-line"></i></a>
							<!-- <div class="cr-date-range dots">
								<span></span>
							</div> -->
						</div>
					</div>
					<div class="cr-card-content card-default">
						<div class="order-table">
							<div class="table-responsive">
								<table id="recent_order_data_table" class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Product</th>
											<th>Customer</th>
											<th>Amount</th>
											<th>Status</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>

										<?php $stt = 0;
										foreach ($orders_with_details as $order):
											$stt++;
											$products = "";
											foreach ($order['details'] as $detail) {
												$products .= " - " . $detail['nameproduct'] . " (" . $detail['quantity'] . " x " . $detail['price'] . "$)<br>";
											}
										?>
											<tr>
												<td class="token">#<?= $stt; ?></td>
												<td> <?= $products ?></td>
												<td><?= $order['fullname']; ?></td>
												<td>$<?= $order['subtotal']; ?></td>
												<td class="<?= strtolower($order['status']); ?>"><?= ucfirst($order['status']); ?></td>
												<td><?= $detail['quantity']; ?> </td>
											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
include "footer.php";
?>