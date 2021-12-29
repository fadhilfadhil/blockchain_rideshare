
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
include 'abie.php';
include 'config/config.php';
error_reporting(E_ALL);
$username = $_REQUEST['username'];
$target_dir = "uploads/";
$target_file = $target_dir . "skck.jpg";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


require_once "vendor/autoload.php";
use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;
$link = new HttpProvider(new HttpRequestManager("http://".$hosting.":8545"));
$web3 = new Web3($link);
$eth = $web3->eth;
use Cloutier\PhpIpfsApi\IPFS;
// connect to ipfs daemon API server
$ipfs = new IPFS($hosting, "8080", "5001");

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["skck_driver"]["tmp_name"]);
  if($check !== false ) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["skck_driver"]["size"] > 1000 * 1000){
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 ) {
  echo "Sorry, only JPG, JPEG & PNG  files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    $image = $_FILES['skck_driver']['tmp_name'];
    $fo = fopen($_FILES['skck_driver']['tmp_name'], "r");
    $imageContent = fread($fo, filesize($image));
    $hashskck = $ipfs->add($imageContent);
    

    $contract = new Contract($link,$abidriver);
    $fromAccount = '0x3e1a9c4Ab16817cd19f511C4b5139292fB9710c8';
    $contractAddress = $addressdriver;//'0xfb1ca0a9b68b6973d4af4033e4fc2403850ac600';

    $contract->at($contractAddress)->send('update_skck',$username,$hashskck,[
        'from' => $fromAccount,
        'gas' => '0x200b20'
    ], function ($err, $result)  {
        if ($err !== null) {
            echo 'error';
        }
        if ($result) {
    
        }
        $transactionId = $result;
    
    });



    echo 'Upload Success';
    }








?>
