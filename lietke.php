<?php
  include("ketnoi.php");
  session_start();
  if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
  }
  $random_sp = "SP".rand(0000,99999);
  $sql = "SELECT * FROM sanpham order by masp desc";
  $result = mysqli_query($conn, $sql);
?>

<?php include("header.php");?>
<body>
  <div class="container">
    <h2>Danh sách sản phẩm</h2>
    <form action="timkiem.php" method="get" class="d-flex" style="margin-bottom: 15px;">
        <input class="form-control me-2" type="text" name="keyword" placeholder="Tìm kiếm theo mã sản phẩm hoặc tên sản phẩm" require>
        <button class="btn btn-outline-info">Search</button>
    </form>
    <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-bottom: 15px;">
        Thêm sản phẩm
      </button>
    <!-- <a href="them.php" class="btn btn-primary mb-3">Thêm sản phẩm</a> -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Ảnh sản phẩm</th>
          <th>Số lượng</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['masp']."</td>";
            echo "<td>".$row['tensp']."</td>";
            echo "<td><img src='".$row['anhsp']."' alt='Ảnh sản phẩm' width='80px' height='80px' class='img-thumbnail'></td>";
            echo "<td>".$row['soluong']."</td>";
            echo "<td>".$row['trangthai']."</td>";
            echo "<td>
              <a href=sua.php?sid='".$row['ID']."' class='btn btn-warning'>Sửa</a>
              <a onclick= return confirm('Bạn có muốn xoá sản phẩm này không?') href=xoa.php?sid='".$row['ID']."' class='btn btn-danger'>Xoá</a>
            </td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
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
            <button type="submit" class="btn btn-success">Xác nhận</button>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</body>
<?php include("footer.php");?>
</html>