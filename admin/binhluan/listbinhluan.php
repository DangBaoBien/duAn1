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
        <style>
            .table {
                width: 100%;
                /* Đảm bảo bảng chiếm toàn bộ chiều rộng */
            }

            .table th,
            .table td {
                padding: 8px;
                /* Tạo khoảng cách giữa nội dung và viền bảng */
                text-align: left;
                /* Căn trái nội dung */
            }

            .table th {
                font-weight: bold;
                background-color: #f9f9f9;
                /* Màu nền cho tiêu đề */
            }

            .table tr:hover {
                background-color: #f4f4f4;
                /* Hiệu ứng hover khi rê chuột */
            }

            .table td:nth-child(6) {
                word-wrap: break-word;
                /* Cho phép xuống dòng nội dung dài */
                max-width: 300px;
                /* Giới hạn chiều rộng nội dung */
            }
        </style>
        </style>
        <!-- Category table -->
        <table class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">ID-Comment</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Idaccount</th>
                    <th scope="col">Idproduct</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($list_binhluan as $binhluan) {
                    $total++;
                    extract($binhluan);

                    $deletecomment = "index.php?act=deletecomment&idcomment=" . $idcomment; ?>
                    <tr>
                        <td><?= $total ?></td>
                        <td><?= $binhluan['idcomment'] ?></td>
                        <td><?= $binhluan['fullname'] ?></td>
                        <td><?= $binhluan['idaccount'] ?></td>
                        <td><?= $binhluan['idproduct'] ?></td>
                        <td><?= $binhluan['content'] ?></td>
                        <td><?= $binhluan['date'] ?></td>
                        <td>
                            <!-- Dropdown for Edit and Delete actions -->
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="actionDropdown' . $idcomment . '" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only"><i
                                            class="ri-settings-3-line"></i></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionDropdown<?= $binhluan['idcomment'] ?>">
                                    <li><a class="dropdown-item" href="<?= $deletecomment ?>">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php     }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
<?php include "footer.php"; ?>