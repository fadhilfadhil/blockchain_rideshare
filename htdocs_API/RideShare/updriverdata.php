<?php $username = $_REQUEST['username'];?>

<!DOCTYPE html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

<html>
<body>

<form action="uploaddatadriver.php?username=<?php echo $username?>" method="post" enctype="multipart/form-data">
  Username : <?php echo $username?><br>
  Upload gambar SKCK <br>
  (image file max 1Mb)<br>
  SKCK:
  <input type="file" name="skck_driver" id="skck_driver">
  <br>
  <input type="submit" value="Upload Data" name="submit">
</form>

</body>
</html>
