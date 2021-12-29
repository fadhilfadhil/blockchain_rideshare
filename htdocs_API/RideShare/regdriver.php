<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include 'abie.php';
include 'config/config.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$nama = $_REQUEST['nama'];
$hp = $_REQUEST['hp'];
$ktp = $_REQUEST['ktp'];
$email = $_REQUEST['email'];
$plat = $_REQUEST['plat'];


require_once "vendor/autoload.php";
$abi = '[{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_email","type":"string"}],"name":"change_email_driver","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_no_telepon","type":"string"}],"name":"change_no_driver","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_newpass","type":"string"}],"name":"change_pass_driver","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_nama","type":"string"},{"internalType":"string","name":"_no_telepon","type":"string"},{"internalType":"string","name":"_no_ktp","type":"string"},{"internalType":"string","name":"_email","type":"string"},{"internalType":"string","name":"_plat","type":"string"},{"internalType":"string","name":"_no_stnk","type":"string"},{"internalType":"string","name":"_link_skck","type":"string"}],"name":"daftar_driver","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"del_driver","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"}],"name":"driver_login","outputs":[{"internalType":"bool","name":"","type":"bool"},{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_driver","type":"uint256"}],"name":"get_driver","outputs":[{"components":[{"internalType":"uint256","name":"id_driver","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"},{"internalType":"string","name":"plat","type":"string"},{"internalType":"uint256","name":"rating","type":"uint256"},{"internalType":"string","name":"no_stnk","type":"string"},{"internalType":"string","name":"skck","type":"string"},{"internalType":"string","name":"status","type":"string"}],"internalType":"struct RideShare_driver.Driver","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_driver_all","outputs":[{"components":[{"internalType":"uint256","name":"id_driver","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"},{"internalType":"string","name":"plat","type":"string"},{"internalType":"uint256","name":"rating","type":"uint256"},{"internalType":"string","name":"no_stnk","type":"string"},{"internalType":"string","name":"skck","type":"string"},{"internalType":"string","name":"status","type":"string"}],"internalType":"struct RideShare_driver.Driver[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"verif_driver","outputs":[],"stateMutability":"payable","type":"function"}]';

use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;

$link = new HttpProvider(new HttpRequestManager("http://".$hosting.":8545"));
$web3 = new Web3($link);
$eth = $web3->eth;

$contract = new Contract($link,$abidriver);

$fromAccount = '0x3e1a9c4Ab16817cd19f511C4b5139292fB9710c8';
$contractAddress = $addressdriver; //'0xc2f71955fd702c6fd68895d0a9b824c0d8da592b';
settype($password, "string");
settype($username, "string");
settype($nama, "string");
settype($email, "string");
settype($plat, "string");
$hp = "'" . $hp;
$ktp = "'" . $ktp;
$OKE = FALSE;

$contractAddress = $addressdriver; //'0xc2f71955fd702c6fd68895d0a9b824c0d8da592b';
$contract->at($contractAddress)->call('driver_login',$username,$password,[
    'from' => $fromAccount,
    'gas' => '0x200b20'
], function ($err, $result) use ($OKE,$username,$password,$nama,$hp,$ktp,$email,$plat,$contract,$contractAddress,$fromAccount) {
    if ($err !== null) {
        echo 'error';
    }
    if ($result){
        if($result[1]=="username tidak ditemukan"){
            $OKE=TRUE;
        }
        if($OKE){
            $contract->at($contractAddress)->send('daftar_driver',$username,$password,$nama,$hp,$ktp,$email,$plat,[
                'from' => $fromAccount,
                'gas' => '0x300b20'
            ], function ($err, $result)  {
                if ($err !== null) {
                    echo 'error';
                }
                if ($result) {
            
                    echo  ' Driver Registration Successfull';
                }
                $transactionId = $result;
            
            });
            }else{
                echo 'Username '.$username.' Already Exist, Select Other Username';
            }


    }
    $transactionId = $result;

});




?>