<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";

$idproduct = $_POST['idproduct'] ?? null;
$loggedIn = isset($_SESSION['taikhoan']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binhluan'])) {
    if (!$loggedIn) {
        echo "<p style='color: red;'>Vui lòng đăng nhập để bình luận.</p>";
        exit();
    }

    $idaccount = $_SESSION['taikhoan']['idaccount'];
    $fullname = $_SESSION['taikhoan']['fullname'];
    $content = trim($_POST['content'] ?? '');
    $rating = intval($_POST['rating'] ?? 0);
    $date = date("Y-m-d");

    if (!empty($content) && !empty($idproduct)) {
        insert_binhluan($idaccount, $idproduct, $date, $content, $rating, $fullname);
        // Chuyển hướng về trang sản phẩm
        header("Location: /duAnmot/index.php?act=productdetails&idproduct=" . urlencode($idproduct));
        exit();
    } else {
        echo "<p style='color: red;'>Vui lòng nhập nội dung bình luận và chọn sản phẩm.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link rel="stylesheet" href="view/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    /* Styling for the table */
    .review-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-family: Arial, sans-serif;
    }

    /* Styling for table headers */
    .fullname {
        width: 30%;
    }

    .content {
        width: 70%;
    }
</style>

<body>
<div class="row mb">
    <div class="post">
        <?php if ($loggedIn): ?>
            <div id="comments">
                <?php
                $list_binhluan = load_all_binhluan($idproduct);
                if (!empty($list_binhluan)) { ?>
                    <style>
                        table .date {
                            font-size: 10px;
                        }

                        table .fullname {
                            font-weight: bold;
                        }

                        #content {
                            background: transparent;
                            border: 1px solid #e9e9e9;
                            color: #2b2b2d;
                            height: 100px;
                            padding: 10px 15px;
                            margin-bottom: 0;
                            width: 100%;
                            outline: none;
                            font-size: 14px;
                            display: block;
                            border-radius: 5px;
                        }
                    </style>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%;">STT</th>
                                <th scope="col" style="width: 15%;">Họ tên</th>
                                <th scope="col" style="width: 60%;">Nội dung</th>
                                <th scope="col" style="width: 20%;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            foreach ($list_binhluan as $binhluan) {
                                $stt++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $stt ?></th>
                                    <td>
                                        <div class="fullname mb-1"><?= $binhluan['fullname'] ?></div>
                                        <div class="date"><?= $binhluan['date'] ?></div>
                                    </td>
                                    <td><?= $binhluan['content'] ?></td>
                                    <td>
                                        <?php
                                        if ($binhluan['idaccount'] === $_SESSION['taikhoan']['idaccount']) { ?>
                                            <button class="btn btn-primary btn-sm editButton"
                                                data-id="<?= $binhluan['idcomment'] ?>"
                                                data-content="<?= htmlspecialchars($binhluan['content']) ?>">Sửa</button>
                                            <a href="index.php?act=deletecomment&idcomment=<?= $binhluan['idcomment'] ?>"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?');"
                                                class="btn btn-danger btn-sm">Xóa</a>
                                        <?php
                                        } else if ($_SESSION['taikhoan']['role'] === 1) { ?>
                                            <a href="index.php?act=deletecomment&idcomment=<?= $binhluan['idcomment'] ?>"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?');"
                                                class="btn btn-danger btn-sm">Xóa</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p style="color: #64b496">Chưa có bình luận nào.</p>
                <?php } ?>
            </div>

            <!-- Form Bình Luận -->
            <form id="commentForm" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" id="idcomment" name="idcomment" value="">
                <input type="hidden" name="idproduct" value="<?= htmlspecialchars($idproduct) ?>">
                <div class="post">
                    <div class="cr-ratting-star mt-3">
                        <span>Bình luận của bạn:</span>
                    </div>
                    <textarea id="content" name="content" placeholder="Nhập bình luận..."></textarea>
                    <button class="cr-button mt-3" type="submit" id="submitButton" name="binhluan" value="Submit">Gửi</button>
                </div>
            </form>
        <?php else: ?>
            <div class="boxbl" style="color: #64b496;">
                Vui lòng <a style="text-decoration: underline; color:red;" href="index.php?act=dangnhap">đăng nhập</a> để xem và bình luận.
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // JavaScript xử lý sự kiện nút sửa
    document.querySelectorAll('.editButton').forEach(button => {
        button.addEventListener('click', function () {
            const idComment = this.getAttribute('data-id');
            const content = this.getAttribute('data-content');
            
            // Gán dữ liệu vào form
            document.getElementById('idcomment').value = idComment;
            document.getElementById('content').value = content;

            // Thay đổi action và nút submit
            const commentForm = document.getElementById('commentForm');
            commentForm.action = "index.php?act=suabinhluan";
            const submitButton = document.getElementById('submitButton');
            submitButton.innerText = "Cập nhật";
            submitButton.name = "suabinhluan";
        });
    });
</script>


    <script>
        $(document).ready(function() {
            const stars = $('.cr-t-review-rating i');
            const ratingInput = $('#rating');

            stars.on('click', function() {
                const value = $(this).data('value');
                ratingInput.val(value);

                // Đổi màu các sao
                stars.each(function() {
                    const starValue = $(this).data('value');
                    $(this).toggleClass('ri-star-s-fill', starValue <= value)
                        .toggleClass('ri-star-s-line', starValue > value);
                });
            });
        });
    </script>
</body>

</html>