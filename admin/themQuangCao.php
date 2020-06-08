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

    $vitri=$_POST["vitri"];
    settype($vitri,"int");
    $MoTa=$_POST["MoTa"];
    $Url=$_POST["Url"];;
    $urlHinh=$_POST["urlHinh"];
    $SoLanClick=0;
    
    $conn=mysqli_connect("localhost",'root','','khoaphamtraining');
    $qr="INSERT INTO quangcao
          VALUES(null,'$vitri','$MoTa','$Url','$urlHinh',$SoLanClick)
    ";
    mysqli_query($conn,$qr);
    header("location:./listQuangCao.php");
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
          <td>vitri</td>
          <td>
            <select name="vitri" id="vitri">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>MoTa</td>
          <td>
            <input name="MoTa" type="text" />
          </td>
      </tr>

      <tr>
          <td>Url</td>
          <td>
            <input name="Url" type="text" />
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
          <td>&nbsp;</td>
          <td>
            <input type="submit" name="btnThem" value="Thêm" />
          </td>
      </tr>
      
    </table>

  </form>
</body>
</html>