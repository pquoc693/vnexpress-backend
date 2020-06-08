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
  $idQC=$_GET["idQC"];
  settype($idQC,"int");
  $qr="
          DELETE FROM quangcao
          WHERE idQC='$idQC'
    ";
    
    mysqli_query($conn,$qr);
    header("location:./listQuangCao.php");
?>
