<?php $username = $_REQUEST['username'];?>

<!DOCTYPE html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

<html>
<body>


Username : <?php echo $username?><br>
 
<a href="updriverdata.php?username=<?php echo $username?>"><button type="button" name="skck_driver" id="skck_driver" > Upload SKCK</button></a>
    <br>

    <a href="updriverdata2.php?username=<?php echo $username?>"><button type="button" name="stnk_driver" id="stnk_driver">Upload STNK</button></a>



</body>
</html>
