<?php
  include("ketnoi.php");
  $id = $_GET["sid"];
  $sql = "SELECT * from sanpham where ID = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

?>
<?php include("header.php");?>
<body>
  <div class="container">
    <h2>Sửa sản phẩm</h2>
    <form action="capnhat.php" method="post" enctype="multipart/form-data">
      <input type="number" name="sid" id="sid" hidden value="<?php echo $row['ID']; ?>">
      <div class="mb-3 mt-3">
        <label for="masp" class="form-label">Mã sản phẩm:</label>
        <input type="text" class="form-control" id="masp" name="masp" value="<?php echo $row['masp'];?>" readonly style="background: #EEEE;">
      </div>
      <div class="mb-3">
        <label for="tensp" class="form-label">Tên sản phẩm:</label>
        <input type="text" class="form-control" id="tensp" placeholder="Nhập tên sản phẩm" name="tensp" value="<?php echo $row['tensp'];?>" required>
      </div>
      <div class="mb-3">
        <label for="anhsp" class="form-label">Ảnh sản phẩm:</label>
        <img src="<?php echo $row['anhsp'];?>" alt="Ảnh sản phẩm" width="100px" height="100px" class="img-thumbnail mb-2">
        <input type="file" class="form-control" id="image" name="image">
        <input type="text" name="anh_old" id="anh_old" hidden value="<?php echo $row['anhsp'];?>">
      </div>
      <div class="mb-3">
        <label for="soluong" class="form-label">Số lượng:</label>
        <input type="number" class="form-control" id="soluong" placeholder="Nhập số lượng sản phẩm" name="soluong" value="<?php echo $row['soluong'];?>" required>
      </div>
      <div class="mb-3">
        <label for="trangthai" class="form-label">Trạng thái:</label>
        <select name="trangthai" id="trangthai" class="form-select">
          <option value="còn hàng" <?php if($row['trangthai'] == 'còn hàng') echo "selected";?>>Còn hàng</option>
          <option value="đã hết" <?php if($row['trangthai'] == 'đã hết') echo "selected";?> >Đã hết</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Xác nhận</button>
    </form>
  </div>
</body>
<?php include("footer.php");?>
</html>