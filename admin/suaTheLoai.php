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

<?php
  $idTL=$_GET["idTL"];
  settype($idTL,"int");
  $row_theloai=ChiTietTheLoai($idTL);

?>

<?php
  if(isset($_POST['btnSua']))
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $TenTL=$_POST['TenTL'];
    $TenTL_KhongDau=changeTitle($TenTL);
    $ThuTu=$_POST['ThuTu'];
    settype($ThuTu,"int");
    $AnHien=$_POST['AnHien'];
    settype($AnHien,"int");
    $qr="
          UPDATE theloai SET
          TenTL='$TenTL',
          TenTL_KhongDau='$TenTL_KhongDau',
          ThuTu='$ThuTu',
          AnHien='$AnHien'
          WHERE idTL=$idTL
    ";
    
    mysqli_query($conn,$qr);
    header("location:./listTheLoai.php");
  }
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
  <!--Thêm thể loại-->

  <form method="POST" action="">
      <table border="1" width="500" align="center">
        <tr>
          <th colspan="2">SỬA THỂ LOẠI</th>
        <tr>
        
        <tr>
          <td>TenTL</td>
          <td>
              <input type="text" id="TenTL" name="TenTL" value="<?php echo $row_theloai["TenTL"] ?>">
          </td>
        <tr>
        <tr>
          <td>ThuTu</td>
          <td>
              <input type="text" id="ThuTu" name="ThuTu" value="<?php echo $row_theloai["ThuTu"] ?>">
          </td>
        <tr>
        <tr>
          <td>AnHien</td>
          <td>
            <input <?php if($row_theloai["AnHien"]==0) echo "checked='checked'" ?> type="radio" id="an" name="AnHien" value="0">Ẩn 
            <input <?php if($row_theloai["AnHien"]==1) echo "checked='checked'" ?> type="radio" id="hien" name="AnHien" value="1">Hiện
          </td>
        <tr>
        <tr >
              
              <th colspan="2">
                    <input type="submit" name="btnSua" value='Sửa'>
              </th>
        </tr>
      </table>
      
    </form>

</body>
</html>