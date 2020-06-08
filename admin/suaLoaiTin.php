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
  $idLT=$_GET["idLT"];
  settype($idLT,"int");
  $chitietloaitin=ChiTietLoaiTin($idLT);
?>

<?php
  if(isset($_POST["btnSua"]))
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');

    $Ten=$_POST['Ten'];
    $Ten_KhongDau=changeTitle($Ten);
    $ThuTu=$_POST['ThuTu'];
    settype($ThuTu,"int");
    $AnHien=$_POST['AnHien'];
    settype($AnHien,"int");
    $idTL=$_POST['idTL'];
    settype($idTL,"int");
    $qr="
          UPDATE loaitin SET
          Ten='$Ten',
          Ten_KhongDau='$Ten_KhongDau',
          ThuTu=' $ThuTu',
          AnHien='$AnHien',
          idTL='$idTL'
          WHERE idLT='$idLT'

    ";
    
    mysqli_query($conn,$qr);
    header("location:./listLoaiTin.php");//chuyển về trang listTheLoai
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
  <!--Thêm loại tin-->

  <form method="POST" action="">
      <table border="1" width="500" align="center">
        <tr>
          <th colspan="2">SỬA LOẠI TIN</th>
        <tr>
        
        <tr>
          <td>Ten</td>
          <td>
              <input type="text" name="Ten" value="<?php echo $chitietloaitin["Ten"] ?>">
          </td>
        <tr>
        <tr>
          <td>ThuTu</td>
          <td>
              <input type="text" name="ThuTu" value="<?php echo $chitietloaitin["ThuTu"] ?>">
          </td>
        </tr>
        <tr>
          <td>AnHien</td>
          <td>
            <input type="radio"  name="AnHien" value="0" <?php if($chitietloaitin["AnHien"]==0) echo "checked='checked'" ?> >Ẩn 
            <input type="radio"  name="AnHien" value="1" <?php if($chitietloaitin["AnHien"]==1) echo "checked='checked'" ?>>Hiện
          </td>
        </tr>
        <tr>
          <td>idTL</td>
          <td>
              <select name="idTL" id="idTL">
                <?php
                  $theloai=DanhSachTheLoai();
                  while($row_theloai=mysqli_fetch_array($theloai))
                  {
                ?>
                <option <?php if($row_theloai["idTL"]==$chitietloaitin["idTL"]) echo "selected='selected'" ?> value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
                <?php
                  }
                ?>
              
              </select>
          </td>
        </tr>
        <tr >
              
              <th colspan="2">
                    <input type="submit" name="btnSua" value='Sửa'>
              </th>
        </tr>
      </table>
      
    </form>

</body>
</html>