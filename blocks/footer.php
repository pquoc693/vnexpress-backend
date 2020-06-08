<div class="thongtin-title">
	<div class="right">
    
          <a href="#"><span class="SetHomePage ico_respone_01">&nbsp;</span>Đặt VnExpress làm trang chủ</a>
          
          <a href="#"><span class="top">&nbsp;</span>Về đầu trang</a>
       
    </div>
</div>
<div class="thongtin-content">

<?php
		$theloai=TheLoai();
		while($row_theloai=mysqli_fetch_array($theloai))
		{
			$idTL=$row_theloai['idTL'];
	?>
	<ul class="ulBlockMenu">
                <li class="liFirst">
                   <h2>
                      <a class="mnu_giaoduc" href="#"><?php  echo $row_theloai['TenTL'] ?></a>
                   </h2>
                </li>
                <?php
							$dsloaitin_theo_theloai=DSLoaiTin_Theo_TheLoai($idTL);
							while($row_dsloaitin_theo_theloai=mysqli_fetch_array($dsloaitin_theo_theloai))
							{
						?>
                <li class="liFollow">
                   <h2>
                      <a href="index.php?p=tintrongloai&idLT=<?php  echo $row_dsloaitin_theo_theloai['idLT'] ?>"><?php  echo $row_dsloaitin_theo_theloai['Ten'] ?> </a>
                   </h2>
                </li>
                <?php
                     }
                ?>
                
   </ul>
<?php
      }
?>

</div>




