<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include 'config/config.php';
$hash = $_REQUEST['hash'];
$link = '<img src="http://'.$hosting.':8080/ipfs/'.$hash;
$lin2 = '">';
$linkk = $link.$lin2;

?>

<script language="javascript" type="text/javascript" src="./config/config.js"></script>


<?php echo $linkk; ?> 
