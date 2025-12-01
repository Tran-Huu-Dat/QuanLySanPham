<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Quan ly benh nhan</title>
  <style>
    header{
      background-color: #1b47c1ff;
      color: white;
      padding: 15px 0;
      text-align:center;
    }
    header img{
      height: 50px;
      margin-right:10px;
    }
    footer{
      background-color: #84898dff;
      padding: 10px 0;
      text-align: center;
      font-weight: 500;
      border-top: 1px solid #ddd;
      margin-top:30px;
    }
  </style>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center px-4">
      <div class="d-flex align-items-center">
        <img src="image.png" alt="logo" height="50">
        <h2>ỨNG DỤNG QUẢN LÝ SẢN PHẨM</h2>
      </div>
      <?php if(isset($_SESSION["username"])): ?>
        <div>
          <span class="me-2 text-white">Xin chào, <?php echo $_SESSION["username"];?></span>
          <a href="logout.php" class="btn btn-light btn-sm">Đăng xuất</a>
        </div>
      <?php endif; ?>
    </header>
    <div class="container mt-4">
  </body>
</html>