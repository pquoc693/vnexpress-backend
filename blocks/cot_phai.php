<!-- box cat -->
<?php
  $idLT=1;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        <?php
          $tenloaitin=TenLoaiTin($idLT);
          $row=mysqli_fetch_array($tenloaitin);
        ?>
        	<a href="#"><?php echo $row['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tinmoinhat_mottin=TinMoiNhat_TheoLoaiTin_MotTin($idLT);
            $row_tinmoinhat_mottin=mysqli_fetch_array($tinmoinhat_mottin);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mottin['idTin']; ?>"> <?php echo $row_tinmoinhat_mottin['TieuDe']; ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhat_mottin['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row_tinmoinhat_mottin['TomTat']; ?></div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
            <?php
              $tinmoinhat_bontin=TinMoiNhat_TheoLoaiTin_BonTin($idLT);
              while($row_tinmoinhat_bontin=mysqli_fetch_array($tinmoinhat_bontin))
              {
            ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_bontin['idTin']; ?>"><?php echo $row_tinmoinhat_bontin['TieuDe']; ?></a></h3>
           <?php
            }
            ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->
<?php
  $idLT=2;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        <?php
          $tenloaitin=TenLoaiTin($idLT);
          $row=mysqli_fetch_array($tenloaitin);
        ?>
        	<a href="#"><?php echo $row['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tinmoinhat_mottin=TinMoiNhat_TheoLoaiTin_MotTin($idLT);
            $row_tinmoinhat_mottin=mysqli_fetch_array($tinmoinhat_mottin);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mottin['idTin']; ?>"> <?php echo $row_tinmoinhat_mottin['TieuDe']; ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhat_mottin['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row_tinmoinhat_mottin['TomTat']; ?></div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
            <?php
              $tinmoinhat_bontin=TinMoiNhat_TheoLoaiTin_BonTin($idLT);
              while($row_tinmoinhat_bontin=mysqli_fetch_array($tinmoinhat_bontin))
              {
            ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_bontin['idTin']; ?>"><?php echo $row_tinmoinhat_bontin['TieuDe']; ?></a></h3>
           <?php
            }
            ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->
<?php
  $idLT=3;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        <?php
          $tenloaitin=TenLoaiTin($idLT);
          $row=mysqli_fetch_array($tenloaitin);
        ?>
        	<a href="#"><?php echo $row['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tinmoinhat_mottin=TinMoiNhat_TheoLoaiTin_MotTin($idLT);
            $row_tinmoinhat_mottin=mysqli_fetch_array($tinmoinhat_mottin);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mottin['idTin']; ?>"> <?php echo $row_tinmoinhat_mottin['TieuDe']; ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhat_mottin['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row_tinmoinhat_mottin['TomTat']; ?></div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
            <?php
              $tinmoinhat_bontin=TinMoiNhat_TheoLoaiTin_BonTin($idLT);
              while($row_tinmoinhat_bontin=mysqli_fetch_array($tinmoinhat_bontin))
              {
            ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_bontin['idTin']; ?>"><?php echo $row_tinmoinhat_bontin['TieuDe']; ?></a></h3>
           <?php
            }
            ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->



<!-- box cat -->
<?php
  $idLT=4;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        <?php
          $tenloaitin=TenLoaiTin($idLT);
          $row=mysqli_fetch_array($tenloaitin);
        ?>
        	<a href="#"><?php echo $row['Ten'] ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tinmoinhat_mottin=TinMoiNhat_TheoLoaiTin_MotTin($idLT);
            $row_tinmoinhat_mottin=mysqli_fetch_array($tinmoinhat_mottin);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mottin['idTin']; ?>"> <?php echo $row_tinmoinhat_mottin['TieuDe']; ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhat_mottin['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row_tinmoinhat_mottin['TomTat']; ?></div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
            <?php
              $tinmoinhat_bontin=TinMoiNhat_TheoLoaiTin_BonTin($idLT);
              while($row_tinmoinhat_bontin=mysqli_fetch_array($tinmoinhat_bontin))
              {
            ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_bontin['idTin']; ?>"><?php echo $row_tinmoinhat_bontin['TieuDe']; ?></a></h3>
           <?php
            }
            ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


