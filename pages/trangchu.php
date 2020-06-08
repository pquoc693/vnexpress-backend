
<?php
    $theloai=TheLoai();
    while($row_theloai=mysqli_fetch_array($theloai))
    {
        $idTL=$row_theloai['idTL'];
?>

<div class="box-cat">
	<div class="cat">
        
    	<div class="main-cat">
        	<a href="#"><?php echo $row_theloai['TenTL'] ?></a>
        </div>

        <div class="child-cat">
            <?php
                $loaitin=DSLoaiTin_Theo_TheLoai($idTL);
                while($row_loaitin=mysqli_fetch_array($loaitin))
                {
            ?>
        	    <a href="index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT'] ?>"><?php echo $row_loaitin['Ten'] ?></a>
            <?php  
                }
            ?>
        </div>
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col1">
                <?php
                    $tinmoi=Tin_Theo_TheLoai_MotTin($idTL);
                    $row_tinmoi=mysqli_fetch_array($tinmoi);
                ?>
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoi['idTin'] ?>"><?php echo $row_tinmoi['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoi['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tinmoi['TomTat'] ?> </div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
                <?php
                    $tinmoi_haitin=Tin_Theo_TheLoai_HaiTin($idTL);
                    while($row_tinmoi_haitin=mysqli_fetch_array($tinmoi_haitin))
                    {
                ?>
               <p class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoi_haitin['idTin'] ?>"><?php echo $row_tinmoi_haitin['TieuDe'] ?></a></p> 
               <?php
                    }
                    ?>
            </div>    
        </div>
    </div>
</div>
<div class="clear"></div>

<?php
    }
?>
<!-- box cat-->



