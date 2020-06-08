<?php
    $idLT=$_GET["idLT"];
    settype($idLT,"int");
?>

<div>
    <?php 
        $tenTL_tenLT=TenTL_And_TenLT();
        $row_tenTL_tenLT=mysqli_fetch_array($tenTL_tenLT);
    ?>
    Trang chủ >> <?php echo $row_tenTL_tenLT['TenTL'] ?> >> <?php echo $row_tenTL_tenLT['Ten']?>
</div>
<?php
    $sotin1trang=4;
    if(isset($_GET["trang"]))
    {
        $trang=$_GET["trang"];
    }
    else
        $trang=1;

    $from=($trang-1)*$sotin1trang;
?>

<?php
    
    $tin=Tin_Theo_TheLoai_PhanTrang($idLT,$from,$sotin1trang);
    while($row_tin=mysqli_fetch_array($tin))
    {
?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin'] ?>"><?php echo $row_tin['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>
<?php
    }
?>

<style type="text/css">
#phantrang {text-align:center;}
#phantrang a{ background-color: #000;color:yellow; padding:5px; margin-right:3px;}
#phantrang a:hover{background-color:#09F;}

</style>
<!-- box cat-->

<div id="phantrang">
<?php
    $tin=Tin_Theo_TheLoai($idLT);
    $sotin=mysqli_num_rows($tin);
    $sotrang=ceil($sotin/$sotin1trang);
    for($i=1;$i<=$sotrang;$i++){
        
?>
    <a <?php if($i==$trang) echo "style='background-color:red'" ?> href="index.php?p=tintrongloai&idLT=<?php echo $idLT  ?>&trang=<?php echo $i?>"><?php echo $i?>  </a>
<?php
}
?>

</div>



