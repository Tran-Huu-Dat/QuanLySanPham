<?php
  $random_sp = "SP".rand(0000,99999);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm</title>
  <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>Thêm sản phẩm</h2>
    <form action="add.php" method="post" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label for="masp" class="form-label">Mã sản phẩm:</label>
        <input type="text" class="form-control" id="masp" name="masp" value="<?php echo $random_sp;?>" readonly style="background: #EEEE;">
      </div>
      <div class="mb-3">
        <label for="tensp" class="form-label">Tên sản phẩm:</label>
        <input type="text" class="form-control" id="tensp" placeholder="Nhập tên sản phẩm" name="tensp" required>
      </div>
      <div class="mb-3">
        <label for="anhsp" class="form-label">Ảnh sản phẩm:</label>
        <input type="file" class="form-control" id="image" name="image" required>
      </div>
      <div class="mb-3">
        <label for="soluong" class="form-label">Số lượng:</label>
        <input type="number" class="form-control" id="soluong" placeholder="Nhập số lượng sản phẩm" name="soluong" required>
      </div>
      <div class="mb-3">
        <label for="trangthai" class="form-label">Trạng thái:</label>
        <select name="trangthai" id="trangthai" class="form-select">
          <option value="còn hàng">Còn hàng</option>
          <option value="đã hết">Đã hết</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
    </form>
  </div>
</body>
</html>