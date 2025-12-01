<?php
include("ketnoi.php");
$id = $_GET["sid"];

//Lấy ảnh
$select_anh = "SELECT anhsp from sanpham where ID = $id";
$res = $conn->query($select_anh);
$row = $res->fetch_assoc();
$image = $row["anhsp"];
//xoá file ảnh ở thư mục uploads
if(!empty($image) && file_exists($image)){
  unlink($image);
}

$sql = "DELETE from sanpham where ID = $id";

if($conn->query($sql) === TRUE){
  echo "<script>
  alert('xoa thanh cong');
  window.location.href = 'lietke.php';
  </script>";
}
else{
  echo "<script>
  alert('xoa that bai');
  window.location.href = 'lietke.php';
  </script>";
}
?>