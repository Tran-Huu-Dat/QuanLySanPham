<?php
  session_start();
  require_once('ketnoi.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST["username"]);
    $matkhau = trim($_POST["matkhau"]);

    $sql = "SELECT * from user where username = '$username' and password = '$matkhau'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1){
      $user = mysqli_fetch_array($result);
      $_SESSION["username"] = $user["username"];
      $_SESSION["quyen"] = $user["quyen"];
      header("location: lietke.php");
      exit;
    }
    else{
     $error ="Sai tên đăng nhập hoặc mật khẩu!";
    }
  }
?>

<?php include("header.php");?>
<h2 class="text-center mb-4">Đăng nhập hệ thống</h2>

<div class="row justify-content-center">
  <div class="col-mb-4">
    <?php if(!empty($error)) echo "<div class='alert alert-danger'>$error</div>";?>
    <form method="post">
      <div class="mb-3 mt-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="matkhau" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="matkhau" placeholder="Enter matkhau" name="matkhau" required>
      </div>
      <div class="form-check mb-3">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
      <a href="change.php">Quên mật khẩu</a>
    </form>
  </div>
</div>
<?php include("footer.php");?>