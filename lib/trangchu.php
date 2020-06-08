<?php

  function TinMoiNhat_MotTin()
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
          SELECT * FROM tin
          ORDER BY idTin DESC
          LIMIT 0,1 
     ";
     return mysqli_query($conn,$qr);
  }
  function TinMoiNhat_BonTin()
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
          SELECT * FROM tin
          ORDER BY idTin DESC
          LIMIT 1,4 
     ";
     return mysqli_query($conn,$qr);
  }
  function TinXemNhieuNhat()
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT* FROM tin
        ORDER BY SoLanXem DESC
        LIMIT 0,8
    ";
    return mysqli_query($conn,$qr);
  }
  function TinMoiNhat_TheoLoaiTin_MotTin($idLT)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
          SELECT * FROM tin
          WHERE idLT=$idLT
          ORDER BY idTin DESC
          LIMIT 0,1 
     ";
     return mysqli_query($conn,$qr);
  }
  function TinMoiNhat_TheoLoaiTin_BonTin($idLT)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
      $qr="
          SELECT * FROM tin
          WHERE idLT=$idLT
          ORDER BY idTin DESC
          LIMIT 1,4 
     ";
     return mysqli_query($conn,$qr);
  }
  function TenLoaiTin($idLT)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
      $qr="
          SELECT Ten FROM loaitin
          WHERE idLT=$idLT
     ";
     return mysqli_query($conn,$qr);
  }
  function QuangCao($vitri)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
      SELECT * FROM quangcao
      WHERE vitri=$vitri
    ";
    return mysqli_query($conn,$qr);
  }
  function TheLoai()
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * 
        FROM theloai  
    ";
    return mysqli_query($conn,$qr);
  }
  //Lấy loại tin theo thể loại
  function DSLoaiTin_Theo_TheLoai($idTL)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * FROM loaitin  
        WHERE  idTL=$idTL
    ";
    return mysqli_query($conn,$qr);
  }
  function Tin_Theo_TheLoai_MotTin($idTL)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * FROM tin
        WHERE idTL=$idTL
        ORDER BY idTin DESC
        LIMIT 0,1
    ";
    return mysqli_query($conn,$qr);
  }
  function Tin_Theo_TheLoai_HaiTin($idTL)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * FROM tin
        WHERE idTL=$idTL
        ORDER BY idTin DESC
        LIMIT 1,2
    ";
    return mysqli_query($conn,$qr);
  }
  function Tin_Theo_TheLoai($idLT)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * FROM tin
        WHERE idLT=$idLT
        ORDER BY idTin DESC
    ";
    return mysqli_query($conn,$qr);
  }

  function Tin_Theo_TheLoai_PhanTrang($idLT,$from,$sotin1trang)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * FROM tin
        WHERE idLT=$idLT
        ORDER BY idTin DESC
        LIMIT $from,$sotin1trang
    ";
    return mysqli_query($conn,$qr);
  }

  function TenTL_And_TenLT()
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
      SELECT TenTL,Ten 
      FROM theloai,loaitin 
      WHERE idLT=1 
      AND theloai.idTL=loaitin.idTL
    ";
    return mysqli_query($conn,$qr);
  }
  function ChiTietTin($idTin)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
      SELECT * FROM tin
      WHERE idTin=$idTin;
    ";
    return mysqli_query($conn,$qr);
  }
  function TinCungLoai_Tu_Tin($idTin)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
       SELECT * FROM tin,loaitin 
       WHERE tin.idLT=loaitin.idLT AND tin.idLT=(SELECT idLT FROM tin WHERE idTin=1 ) AND idTin<>$idTin
       ORDER BY idTin DESC LIMIT 0,3
    ";
    return mysqli_query($conn,$qr);
  }
  function CapNhat_SoLanXem($idTin)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
      UPDATE tin
      SET SoLanXem=SoLanXem+1
      WHERE idTin=$idTin
    ";
    mysqli_query($conn,$qr);
  }
  function TimKiem($tukhoa)
  {
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="
        SELECT * FROM tin
        WHERE TieuDe REGEXP '$tukhoa'
        ORDER BY idTin DESC
    ";
    return mysqli_query($conn,$qr);
  }
?>