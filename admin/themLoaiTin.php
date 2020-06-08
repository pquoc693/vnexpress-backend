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
  if(isset($_POST["btnThem"]))
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');

    $Ten=$_POST['Ten'];
    $Ten_KhongDau=changeTitle($Ten);
    $ThuTu=$_POST['ThuTu'];
    settype($ThuTu,"int");
    $AnHien=$_POST['AnHien'];
    settype($AnHien,"int");
    $idTL=$_POST["idTL"];
    settype($idTL,"int");
    $qr="
          INSERT INTO loaitin 
          VALUES(null,'$Ten','$Ten_KhongDau','$ThuTu','$AnHien','$idTL')
    ";
    
    mysqli_query($conn,$qr);
    header("location:./listLoaiTin.php");//chuyển về trang listLoaiTin
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
          <th colspan="2">THÊM LOẠI TIN</th>
        <tr>
        
        <tr>
          <td>Ten</td>
          <td>
              <input type="text" name="Ten">
          </td>
        <tr>
        <tr>
          <td>ThuTu</td>
          <td>
              <input type="text" name="ThuTu">
          </td>
        </tr>
        <tr>
          <td>AnHien</td>
          <td>
            <input type="radio"  name="AnHien" value="0">Ẩn 
            <input type="radio"  name="AnHien" value="1">Hiện
          </td>
        </tr>
        <tr>
          <td>idTL</td>
          <td>
              <select name="idTL" id="idTL">
                <?php
                  $i=1;
                  $theloai=DanhSachTheLoai();
                  while($row_theloai=mysqli_fetch_array($theloai))
                  {
                ?>
                <option value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
                <?php
                  }
                ?>
              
              </select>
          </td>
        </tr>
        <tr >
              
              <th colspan="2">
                    <input type="submit" name="btnThem" value='Thêm'>
              </th>
        </tr>
      </table>
      
    </form>

</body>
</html>