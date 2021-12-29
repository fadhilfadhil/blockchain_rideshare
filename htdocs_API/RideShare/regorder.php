<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'abie.php';
include 'config/config.php';

$username = $_REQUEST['username'];
$driver = $_REQUEST['driver'];
$lat = $_REQUEST['lat'];
$long = $_REQUEST['long'];
$dlat = $_REQUEST['dlat'];
$dlong = $_REQUEST['dlong'];


require_once "vendor/autoload.php";


use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;

$link = new HttpProvider(new HttpRequestManager("http://".$hosting.":8545"));
$web3 = new Web3($link);
$eth = $web3->eth;

$contract = new Contract($link,$abiorder);

$fromAccount = '0x3e1a9c4Ab16817cd19f511C4b5139292fB9710c8';
$contractAddress = $addressorder; //'0xfb1ca0a9b68b6973d4af4033e4fc2403850ac600';
$long = "'" . $long;
$lat = "'" . $lat;
$dlong = "'" . $dlong;
$dlat = "'" . $dlat;
$contract->at($contractAddress)->send('inp_order',$username,$driver,$long,$lat,$dlong,$dlat,[
    'from' => $fromAccount,
    'gas' => '0x200b20'
], function ($err, $result)  {
    if ($err !== null) {
        echo 'error';
    }
    if ($result) {

        echo   $result . "\n";
        echo  ' berhasil didaftarkan';
    }
    $transactionId = $result;

});


?>