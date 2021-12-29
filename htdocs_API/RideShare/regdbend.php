<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'config/config.php';
include 'abie.php';

$id = $_REQUEST['id'];
$waktu = $_REQUEST['waktu'];
$rating = $_REQUEST['rating'];


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

$waktu = "'" . $waktu;
$contract->at($contractAddress)->send('db_end',$id,$waktu,$rating,[
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