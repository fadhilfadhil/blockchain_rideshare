<?php $username = $_REQUEST['username'];?>

<!DOCTYPE html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

<html>
<body>

<form action="uploadpictdriver.php?username=<?php echo $username?>" method="post" enctype="multipart/form-data">
  Username : <?php echo $username?><br>
  Upload profile picture <br>
  (image file max 1Mb)<br>
  <input type="file" name="pp_driver" id="pp_driver">
  <br>
  <input type="submit" value="Upload Data" name="submit">
</form>

</body>
</html>
