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
  $idTin=$_GET["idTin"];
  settype($idTin,"int");
  $qr="
          DELETE FROM tin
          WHERE idTin='$idTin'
    ";
    
    mysqli_query($conn,$qr);
    header("location:./listTin.php");
?>
