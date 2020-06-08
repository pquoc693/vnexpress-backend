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

    $TieuDe=$_POST["TieuDe"];
    $TieuDe_KhongDau=changeTitle($TieuDe);
    $TomTat=$_POST["TomTat"];
    $urlHinh=$_POST["urlHinh"];
    $Ngay=date("Y-m-d");
    $idUser=$_SESSION["idUser"];
    settype($idUser,"int");
    $Content=$_POST["Content"];
    $idLT=$_POST["idLT"];
    settype($idLT,"int");
    $idTL=$_POST["idTL"];
    settype($idTL,"int");
    $SoLanXem=0;
    $TinNoiBat=$_POST["TinNoiBat"];
    $AnHien=$_POST["AnHien"];
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    echo $qr="INSERT INTO tin
          VALUES(null,'$TieuDe','$TieuDe_KhongDau','$TomTat','$urlHinh','$Ngay',$idUser,'$Content',$idLT,$idTL,$SoLanXem,$TinNoiBat,$AnHien)
    ";
    mysqli_query($conn,$qr);
    header("location:./listTin.php");
  }
?>
<!DOCTYPE html >
<html >
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="layout.css" />
  <script type="text/javascript" src="ckeditor/ckeditor.js" ></script>
  <script type="text/javascript" src="ckfinder/ckfinder.js" ></script>
  <script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>

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

  <!-- Thêm tin-->
  <form method="POST" action="">
    <table border="1" width="1000" align="center" text-align="center">
      <tr>
        <th colspan="2"> 
            THÊM TIN
        </th>
      <tr>
      <tr>
          <td>TieuDe</td>
          <td>
            <input type="text" name="TieuDe" /> 
          </td>
      </tr>
      <tr>
          <td>TomTat</td>
          <td>
            <textarea name="TomTat" rows="10" cols="30"></textarea>
          </td>
      </tr>
      <tr>
          <td>urlHinh</td>

          <td>
              <input type="text" name="urlHinh" /> 
              <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình" /> 
          </td>
      </tr>

      <tr>
          <td>Content</td>
          <td>
            <textarea name="Content" id="Content" rows="10" cols="30"></textarea>
            <script type="text/javascript">
            var editor = CKEDITOR.replace( 'Content',{
              uiColor : '#9AB8F3',
              language:'vi',
              skin:'v2',
              filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
              filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
              filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
              filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			 	
              toolbar:[
              ['Source','-','Save','NewPage','Preview','-','Templates'],
              ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
              ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
              ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
              ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
              ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
              ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
              ['Link','Unlink','Anchor'],
              ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
              ['Styles','Format','Font','FontSize'],
              ['TextColor','BGColor'],
              ['Maximize', 'ShowBlocks','-','About']
              ]
            });		
            </script>

          </td>
      </tr>

      <tr>
          <td>idLT</td>

          <td>
            <select name="idLT" id="idLT">
                <?php
                  $loaitin=DanhSachLoaiTin();
                  while($row_loaitin=mysqli_fetch_array($loaitin))
                  {
                ?>
                <option value="<?php echo $row_loaitin["idLT"] ?>"><?php echo $row_loaitin["Ten"] ?></option>
                <?php
                  }
                ?>
            </select>

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
                <option value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
                <?php
                  }
                ?>
            </select>

          </td>
      </tr>

      <tr>
          <td>TinNoiBat</td>
          <td>
            <input type="radio" name="TinNoiBat"  value="0" />Bình Thường</br>
            <input type="radio" name="TinNoiBat"  value="1" />Nổi Bật
          </td>
      </tr>

      <tr>
          <td>AnHien</td>
          <td>
            <input type="radio" name="AnHien"  value="0" />Ẩn</br>
            <input type="radio" name="AnHien"  value="1" />Hiện
          </td>
      </tr>

      <tr>
          <td>&nbsp;</td>
          <td>
            <input type="submit" name="btnThem" value="Thêm" />
          </td>
      </tr>
      
    </table>

  </form>
</body>
</html>