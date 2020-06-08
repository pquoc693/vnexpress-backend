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

  <!-- Danh sách tin-->
  <table border="1" width="1000" align="center" text-align="center">
    <tr>
      <th colspan="5"> 
          DANH SÁCH TIN
      </th>
    <tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="130"><a href="themTin.php">Thêm</a></td>
    </tr>

    <?php
        $tin=DanhSachTin();
        while($row_tin=mysqli_fetch_array($tin))
        {
          ob_start();
    ?>
    <tr>
        <td>idTin:{idTin}<br />{Ngay}</td>
        <td><a href="suaTin.php?idTin={idTin}">{TieuDe}</a><br /><image style="float:left; margin-right:5px" src="../upload/tintuc/{urlHinh}" width="150" height="50" />{TomTat}</td>
        <td>{TenTL}<br /> - <br />{Ten}</td>
        <td>Số lần xem: {SoLanXem}<br />{TinNoiBat}<br /> - <br />{AnHien}</td>
        <td width="130"><a href="suaTin.php?idTin={idTin}">Sửa</a> - <a href="xoaTin.php?idTin={idTin}">Xóa</a></td>
    </tr>
    <?php
        
       $s=ob_get_clean();

       $s=str_replace("{idTin}",$row_tin["idTin"],$s);
       $s=str_replace("{Ngay}",$row_tin["Ngay"],$s);
       $s=str_replace("{TieuDe}",$row_tin["TieuDe"],$s);
       $s=str_replace("{urlHinh}",$row_tin["urlHinh"],$s);
       $s=str_replace("{TomTat}",$row_tin["TomTat"],$s);
       $s=str_replace("{TenTL}",$row_tin["TenTL"],$s);
       $s=str_replace("{Ten}",$row_tin["Ten"],$s);
       $s=str_replace("{SoLanXem}",$row_tin["SoLanXem"],$s);
       $s=str_replace("{TinNoiBat}",$row_tin["TinNoiBat"],$s);
       $s=str_replace("{AnHien}",$row_tin["AnHien"],$s);
       echo $s;
      }
    ?>
  </table>
</body>
</html>