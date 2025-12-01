<?php
  include("ketnoi.php");

  //Upload image
  $luuanh = "uploads/";
  if(!file_exists($luuanh)){
    mkdir($luuanh, 0777, true);
  }
  $anh = "";
  if($_FILES["image"]["name"] != ""){
    $anh = $luuanh.time()."_".basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $anh);
  }

  $masp = $_POST['masp'];
  $tensp = $_POST['tensp'];
  $soluong = $_POST['soluong'];
  $trangthai = $_POST['trangthai'];
  $sql = "INSERT into sanpham(masp, tensp, anhsp, soluong, trangthai) values('$masp', '$tensp', '$anh', '$soluong', '$trangthai')";

  if($conn->query($sql) === TRUE){
    echo "<script>
      alert('Thêm sản phẩm thành công');
      window.location = 'lietke.php';
    </script>";
  }
  else{
    echo "<script>
      alert('Thêm sản phẩm không thành công');
      window.location = 'lietke.php';
    </script>";
  }
?>