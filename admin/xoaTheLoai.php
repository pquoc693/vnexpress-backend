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
  $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
  $idTL=$_GET["idTL"];
  settype($idTL,"int");
  $qr="
          DELETE FROM theloai
          WHERE idTL='$idTL'
    ";
    
    mysqli_query($conn,$qr);
    header("location:./listTheLoai.php");
?>
