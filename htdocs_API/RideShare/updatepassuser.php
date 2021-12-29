<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
include 'config/config.php';
include 'abie.php';
error_reporting(E_ALL);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$newpassword = $_REQUEST['newpassword'];

require_once "vendor/autoload.php";
$abi = '[{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_newpass","type":"string"}],"name":"change_pass_driver","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_newpass","type":"string"}],"name":"change_pass_penumpang","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_order","type":"uint256"},{"internalType":"uint256","name":"_id_driver","type":"uint256"},{"internalType":"uint256","name":"_jam_ambil","type":"uint256"},{"internalType":"uint256","name":"_biaya","type":"uint256"},{"internalType":"uint256","name":"_rate","type":"uint256"},{"internalType":"string","name":"_review","type":"string"}],"name":"clear_order","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_driver","type":"uint256"},{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_nama","type":"string"},{"internalType":"string","name":"_no_telepon","type":"string"},{"internalType":"string","name":"_no_ktp","type":"string"},{"internalType":"string","name":"_email","type":"string"},{"internalType":"string","name":"_plat","type":"string"}],"name":"daftar_driver","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_order","type":"uint256"},{"internalType":"uint256","name":"_id_user","type":"uint256"},{"internalType":"string","name":"_k_asal","type":"string"},{"internalType":"string","name":"_daerah_asal","type":"string"},{"internalType":"string","name":"_k_tujuan","type":"string"},{"internalType":"string","name":"_daerah_tujuan","type":"string"},{"internalType":"uint256","name":"_jarak","type":"uint256"}],"name":"daftar_order","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_user","type":"uint256"},{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_nama","type":"string"},{"internalType":"string","name":"_no_telepon","type":"string"},{"internalType":"string","name":"_no_ktp","type":"string"},{"internalType":"string","name":"_email","type":"string"}],"name":"daftar_penumpang","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"del_driver","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"del_penumpang","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"}],"name":"driver_login","outputs":[{"internalType":"bool","name":"","type":"bool"},{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_driver","type":"uint256"}],"name":"get_driver","outputs":[{"components":[{"internalType":"uint256","name":"id_driver","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"},{"internalType":"string","name":"plat","type":"string"},{"internalType":"uint256","name":"rating","type":"uint256"}],"internalType":"struct RideShare.Driver","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_driver_all","outputs":[{"components":[{"internalType":"uint256","name":"id_driver","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"},{"internalType":"string","name":"plat","type":"string"},{"internalType":"uint256","name":"rating","type":"uint256"}],"internalType":"struct RideShare.Driver[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_order","type":"uint256"}],"name":"get_orderclear","outputs":[{"components":[{"internalType":"uint256","name":"id_order","type":"uint256"},{"internalType":"uint256","name":"id_driver","type":"uint256"},{"internalType":"uint256","name":"jam_ambil","type":"uint256"},{"internalType":"uint256","name":"jam_selesai","type":"uint256"},{"internalType":"uint256","name":"biaya","type":"uint256"},{"internalType":"uint256","name":"rate","type":"uint256"},{"internalType":"string","name":"review","type":"string"}],"internalType":"struct RideShare.Order_selesai","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_orderclear_all","outputs":[{"components":[{"internalType":"uint256","name":"id_order","type":"uint256"},{"internalType":"uint256","name":"id_driver","type":"uint256"},{"internalType":"uint256","name":"jam_ambil","type":"uint256"},{"internalType":"uint256","name":"jam_selesai","type":"uint256"},{"internalType":"uint256","name":"biaya","type":"uint256"},{"internalType":"uint256","name":"rate","type":"uint256"},{"internalType":"string","name":"review","type":"string"}],"internalType":"struct RideShare.Order_selesai[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_id_order","type":"uint256"}],"name":"get_orderin","outputs":[{"components":[{"internalType":"uint256","name":"id_order","type":"uint256"},{"internalType":"uint256","name":"id_user","type":"uint256"},{"internalType":"uint256","name":"jam","type":"uint256"},{"internalType":"string","name":"koordinat_asal","type":"string"},{"internalType":"string","name":"daerah_asal","type":"string"},{"internalType":"string","name":"koordinat_tujuan","type":"string"},{"internalType":"string","name":"daerah_tujuan","type":"string"},{"internalType":"uint256","name":"jarak","type":"uint256"}],"internalType":"struct RideShare.Order_input","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_orderin_all","outputs":[{"components":[{"internalType":"uint256","name":"id_order","type":"uint256"},{"internalType":"uint256","name":"id_user","type":"uint256"},{"internalType":"uint256","name":"jam","type":"uint256"},{"internalType":"string","name":"koordinat_asal","type":"string"},{"internalType":"string","name":"daerah_asal","type":"string"},{"internalType":"string","name":"koordinat_tujuan","type":"string"},{"internalType":"string","name":"daerah_tujuan","type":"string"},{"internalType":"uint256","name":"jarak","type":"uint256"}],"internalType":"struct RideShare.Order_input[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"get_penumpang","outputs":[{"components":[{"internalType":"uint256","name":"id_user","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"}],"internalType":"struct RideShare.Penumpang","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_penumpang_all","outputs":[{"components":[{"internalType":"uint256","name":"id_user","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"}],"internalType":"struct RideShare.Penumpang[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_penumpang_alllengyg","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"}],"name":"penumpang_login","outputs":[{"internalType":"bool","name":"","type":"bool"},{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"}]';


use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;

$oke = TRUE;
$link = new HttpProvider(new HttpRequestManager("http://".$hosting.":8545"));
$web3 = new Web3($link);
$eth = $web3->eth;

$contract = new Contract($link,$abiuser);

$fromAccount = '0x3e1a9c4Ab16817cd19f511C4b5139292fB9710c8';
$contractAddress = $addressuser;//'0xfb1ca0a9b68b6973d4af4033e4fc2403850ac600';

$contract->at($contractAddress)->call('penumpang_login',$username,$password,[
    'from' => $fromAccount,
    'gas' => '0x200b20'
], function ($err, $result)  {
    if ($err !== null) {
        echo 'error';
    }
    if ($result[0]!='1') {
        $oke = FALSE;
        echo 'Password Incorrect';
    }
    $transactionId = $result;

});

if($oke){
$contract->at($contractAddress)->call('penumpang_login',$username,$password,[
    'from' => $fromAccount,
    'gas' => '0x200b20'
], function ($err, $result) use ($username,$password,$newpassword,$contract,$contractAddress,$fromAccount) {
    if ($err !== null) {
        echo 'error';
    }
    if (isset($result)) {
        if ($username == $result[1]){
            
            $contract->at($contractAddress)->send('change_pass_penumpang',$username,$password,$newpassword,[
                'from' => $fromAccount,
                'gas' => '0x300b20'
            ], function ($err, $result)  {
                if ($err !== null) {
                    echo 'error';
                }
                if ($result) {

                    echo  'Password Update Success';
                }
                $transactionId = $result;

            });
        }
    }
    $transactionId = $result;

});
}




?>