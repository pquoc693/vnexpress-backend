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
        <td>idQC</td>
        <td>vitri</td>
        <td>MoTa</td>
        <td>Url</td>
        <td>urlHinh</td>
        <td>SoLanClick</td>
        <td><a href="themQuangCao.php">Thêm</a></td>
    </tr>
    <?php
      $quangcao=DanhSachQuangCao();
      while($row_quangcao=mysqli_fetch_array($quangcao))
      {
        ob_start();
    ?>
      <tr >
          <td>{idQC}</td>
          <td>{vitri}</td>
          <td>{MoTa}</td>
          <td>{Url}</td>
          <td>{urlHinh}</td>
          <td>{SoLanClick}</td>
          <td><a href="suaQuangCao.php?idQC={idQC}">Sửa</a> - <a href="xoaQuangCao.php?idQC={idQC}">Xóa</a></td>
      </tr>
    <?php
        $s=ob_get_clean();// lưu mảng trong thẻ <tr>
        //thay {idTL} bằng $row_theloai["idTL"], tìm kiếm {idTL} trong $s
        $s=str_replace("{idQC}",$row_quangcao["idQC"],$s);
        $s=str_replace("{vitri}",$row_quangcao["vitri"],$s);
        $s=str_replace("{MoTa}",$row_quangcao["MoTa"],$s);
        $s=str_replace("{Url}",$row_quangcao["Url"],$s);
        $s=str_replace("{urlHinh}",$row_quangcao["urlHinh"],$s);
        $s=str_replace("{SoLanClick}",$row_quangcao["SoLanClick"],$s);
        echo $s;
      }
    ?>

  </table>


</body>
</html>