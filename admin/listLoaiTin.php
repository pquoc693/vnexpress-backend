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

  <!-- Danh sách loại tin-->
  <table border="1" width="1000" align="center" text-align="center">
    <tr>
      <th colspan="7"> 
          DANH SÁCH LOẠI TIN
      </th>
    <tr>
    <tr >
        <td>idLT</td>
        <td>Ten</td>
        <td>Ten_KhongDau</td>
        <td>ThuTu</td>
        <td>AnHien</td>
        <td>idTL</td>
        <td><a href="themLoaiTin.php">Thêm</a></td>
    </tr>
    <?php
      $loaitin=DanhSachLoaiTin();
      while($row_loaitin=mysqli_fetch_array($loaitin))
      {
        ob_start();
    ?>
      <tr >
          <td>{idLT}</td>
          <td>{Ten}</td>
          <td>{Ten_KhongDau}</td>
          <td>{ThuTu}</td>
          <td>{AnHien}</td>
          <td>{idTL}</td>
          <td><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a> - <a href="xoaLoaiTin.php?idLT={idLT}">Xóa</a></td>
      </tr>
    <?php
        $s=ob_get_clean();// lưu mảng trong thẻ <tr>
        //thay {idTL} bằng $row_theloai["idTL"], tìm kiếm {idTL} trong $s
        $s=str_replace("{idLT}",$row_loaitin["idLT"],$s);
        $s=str_replace("{Ten}",$row_loaitin["Ten"],$s);
        $s=str_replace("{Ten_KhongDau}",$row_loaitin["Ten_KhongDau"],$s);
        $s=str_replace("{ThuTu}",$row_loaitin["ThuTu"],$s);
        $s=str_replace("{AnHien}",$row_loaitin["AnHien"],$s);
        $s=str_replace("{idTL}",$row_loaitin["TenTL"],$s);
        echo $s;
      }
    ?>

  </table>


</body>
</html>