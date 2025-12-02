<?php
session_start();
include('ketnoi.php');

$e = "";

if ($_POST) {
    $username = $_POST['username'];

    $matkhau = $_POST['matkhau'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $result->free();
    $stmt->close();

    if ($user) {
        $sql = "UPDATE user SET password = ? WHERE username = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $matkhau, $username);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: login.php");
            exit;
        } else {
            $e = "Lỗi hệ thống, không thể cập nhật.";
        }
    } else {
        $e = "Tên đăng nhập sai";
    }
}
?>

<?php include("header.php");?>
<body>
	<div class="container mt-5 d-flex justify-content-center">
		<form method="post" class="form-group p-4 border rounded" style="width: 400px;">
			<h2 class="text-center mb-3">QUÊN MẬT KHẨU</h2>
			<input type="text" name="username" class="form-control mb-3" placeholder="Tên đăng nhập" required>
			<input type="password" name="matkhau" class="form-control mb-3" placeholder="Mật khẩu mới" required>
			<?php if(!empty($e)): ?>
				<div class="alert alert-danger">
					<?php echo $e ?>
				</div>
			<?php endif ?>
			<button class="btn btn-warning form-control mb-3">THỰC HIỆN</button>
			<a href="login.php">Đăng nhập</a>
		</form>
	</div>
</body>
<?php include("footer.php");?>
</html>