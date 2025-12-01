<?php
  session_start();
  session_start();
  if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
  }
  $tukhoa = isset($_GET["keyword"]) ? trim($_GET["keyword"]) : "";
  if(empty($tukhoa)){
    header("lietke.php");
    exit();
  }
  require_once("ketnoi.php");
  $sql_tk = "SELECT * from sanpham
              where masp like '%$tukhoa%' or
              tensp like '%$tukhoa%'
              order by masp, tensp asc";

  $result = mysqli_query($conn, $sql_tk);
?>

<?php include("header.php");?>
<body>
  <div class="container">
    <h1>Hiện thị kết quả tìm kiếm</h1>
    <a href="lietke.php" class="btn btn-danger">Quay lại trang liệt kê</a>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Ảnh sản phẩm</th>
          <th>Số lượng</th>
          <th>Trạng thái</th>
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
            echo "</tr>";
          }
        ?>
      </tbody>
  </div>
</body>