<?php
  ob_start();
  session_start();
  if(!isset($_SESSION["idUser"])&&$_SESSION['idGroup']!=1)
  {
    header("location:../index.php");
  }
?>
<?php
  require "../lib/dbCon.php";
  require "../lib/quantri.php";
?>
<!DOCTYPE html >
<html >
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>
  <table width="1000" border="0" align="center" cellspacing="0" cellpadding="0" >
    <tr>
      <td id="hangTieuDe">
        TRANG QUẢN TRỊ
        <div  style="width:200px;float:right"> Chào bạn <?php echo $_SESSION["HoTen"] ?> </div>
      </td>
      
    </tr>
    <tr>
      <td id="hang2">
          <?php require "./menu.php" ?>
      </td>
    </tr>
    <tr>
      <td>
      </td>
    </tr>
  </table>

  <!-- Danh sách thể loại -->
  <table border="1" width="500" align="center" text-align="center">
    <tr>
      <th colspan="6"> 
          DANH SÁCH THỂ LOẠI
      </th>
    <tr>
    <tr >
        <td>idTL</td>
        <td>TenTL</td>
        <td>TenTL_KhongDau</td>
        <td>ThuTu</td>
        <td>AnHien</td>
        <td><a href="themTheLoai.php">Thêm</a></td>
    </tr>
    <?php
      $theloai=DanhSachTheLoai();
      while($row_theloai=mysqli_fetch_array($theloai))
      {
        ob_start();
    ?>
      <tr >
          <td>{idTL}</td>
          <td>{TenTL}</td>
          <td>{TenTL_KhongDau}</td>
          <td>{ThuTu}</td>
          <td>{AnHien}</td>
          <td><a href="suaTheLoai.php?idTL={idTL}">Sửa</a> - <a href="xoaTheLoai.php?idTL={idTL}">Xóa</a></td>
      </tr>
    <?php
        $s=ob_get_clean();// lưu mảng trong thẻ <tr>
        //thay {idTL} bằng $row_theloai["idTL"], tìm kiếm {idTL} trong $s
        $s=str_replace("{idTL}",$row_theloai["idTL"],$s);
        $s=str_replace("{TenTL}",$row_theloai["TenTL"],$s);
        $s=str_replace("{TenTL_KhongDau}",$row_theloai["TenTL_KhongDau"],$s);
        $s=str_replace("{ThuTu}",$row_theloai["ThuTu"],$s);
        $s=str_replace("{AnHien}",$row_theloai["AnHien"],$s);
        echo $s;
      }
    ?>

  </table>


</body>
</html>