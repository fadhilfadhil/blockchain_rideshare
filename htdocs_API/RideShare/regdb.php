<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'config/config.php';
include 'abie.php';

$username = $_REQUEST['username'];
$driver = $_REQUEST['driver'];
$hp = $_REQUEST['hp'];
$slat = $_REQUEST['slat'];
$slong = $_REQUEST['slong'];
$dlat = $_REQUEST['dlat'];
$dlong = $_REQUEST['dlong'];
$waktu = $_REQUEST['waktu'];


require_once "vendor/autoload.php";


use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;

$link = new HttpProvider(new HttpRequestManager("http://".$hosting.":8545"));
$web3 = new Web3($link);
$eth = $web3->eth;

$contract = new Contract($link,$abidb);

$fromAccount = '0x3e1a9c4Ab16817cd19f511C4b5139292fB9710c8';
$contractAddress = $addressdb; //'0x4776d5feb2151526564e784db8d9bcf1f85f9f49';
$hp = "'" . $hp;
$slong = "'" . $slong;
$slat = "'" . $slat;
$dlong = "'" . $dlong;
$dlat = "'" . $dlat;
$waktu = "'" . $waktu;
$contract->at($contractAddress)->send('db_acc',$username,$driver,$hp,$slong,$slat,$dlong,$dlat,$waktu,[
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