<?php
  include("ketnoi.php");

  $luuanh = "uploads/";
  if(!file_exists($luuanh)){
    mkdir($luuanh, 0777, true);
  }
  $anh = "";

  if(!empty($_FILES["image"]["name"]) && $_FILES["image"]["name"] != ""){
    //Lấy ảnh cũ
    $id = $_POST["sid"];
    $select_anh = "SELECT anhsp from sanpham where ID = $id";
    $res = $conn->query($select_anh);
    $row = $res->fetch_assoc();
    $image = $row["anhsp"];
    //xoá file ảnh ở thư mục uploads
    if(!empty($image) && file_exists($image)){
      unlink($image);
    }

    $anh = $luuanh.time()."_".basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $anh);
  }
  else{
    $anh = $_POST["anh_old"];
  }

  $id = $_POST["sid"];
  $masp = $_POST['masp'];
  $tensp = $_POST['tensp'];
  $soluong = $_POST['soluong'];
  $trangthai = $_POST['trangthai'];

  $sql = "UPDATE sanpham set masp='$masp', tensp='$tensp', anhsp='$anh', soluong='$soluong', trangthai='$trangthai' where ID = $id";

  if($conn->query($sql) === TRUE){
    echo "<script>
      alert('Cập nhật sản phẩm thành công');
      window.location = 'lietke.php';
    </script>";
  }
  else{
    echo "<script>
      alert('Cập nhật sản phẩm không thành công');
      window.location = 'lietke.php';
    </script>";
  }
?>