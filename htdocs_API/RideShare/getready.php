<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'abie.php';
include 'config/config.php';


require_once "vendor/autoload.php";
$abi = '[{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_email","type":"string"}],"name":"change_email_penumpang","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_no_telepon","type":"string"}],"name":"change_no_penumpang","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_newpass","type":"string"}],"name":"change_pass_penumpang","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"},{"internalType":"string","name":"_nama","type":"string"},{"internalType":"string","name":"_no_telepon","type":"string"},{"internalType":"string","name":"_no_ktp","type":"string"},{"internalType":"string","name":"_email","type":"string"}],"name":"daftar_penumpang","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"del_penumpang","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"}],"name":"get_penumpang","outputs":[{"components":[{"internalType":"uint256","name":"id_user","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"}],"internalType":"struct RideShare_user.Penumpang","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_penumpang_all","outputs":[{"components":[{"internalType":"uint256","name":"id_user","type":"uint256"},{"internalType":"string","name":"username","type":"string"},{"internalType":"string","name":"password","type":"string"},{"internalType":"string","name":"nama","type":"string"},{"internalType":"string","name":"no_telepon","type":"string"},{"internalType":"string","name":"no_ktp","type":"string"},{"internalType":"string","name":"email","type":"string"}],"internalType":"struct RideShare_user.Penumpang[]","name":"","type":"tuple[]"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"get_penumpang_alllengyg","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"string","name":"_username","type":"string"},{"internalType":"string","name":"_password","type":"string"}],"name":"penumpang_login","outputs":[{"internalType":"bool","name":"","type":"bool"},{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"}]';


use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;

$link = new HttpProvider(new HttpRequestManager("http://".$hosting.":8545"));
$web3 = new Web3($link);
$eth = $web3->eth;
$count = 0;
$contract = new Contract($link,$abiready);
$contractD = new Contract($link,$abidriver);
$fromAccount = '0x3e1a9c4Ab16817cd19f511C4b5139292fB9710c8';
$contractAddress = $addressready; //'0xfb1ca0a9b68b6973d4af4033e4fc2403850ac600';
$contractAddressD = $addressdriver;

$contract->at($contractAddress)->call('get_ready_length',[
    'from' => $fromAccount,
    'gas' => '0x200b20'
], function ($err, $result) use ($contract,$contractAddress,$fromAccount,$contractD,$contractAddressD  ) {
    if ($err !== null) {
        echo 'error';
    }
    if (isset($result)) {
        $count = (string)$result[0]-1; 

        for ($x = 0; $x <= $count; $x++) {
            $contract->at($contractAddress)->call('get_ready_idx',$x,[
                'from' => $fromAccount,
                'gas' => '0x200b20'
            ], function ($err, $result) use ($fromAccount,$contractD,$contractAddressD  ) {
                if ($err !== null) {
                    echo 'error';
                }
                if (isset($result)) {

                    $contractD->at($contractAddressD)->call('get_driver',$result[0],[
                        'from' => $fromAccount,
                        'gas' => '0x200b20'
                    ], function ($err2, $result2) use ($result) {
                        if ($err2 !== null) {
                            echo 'error';
                        }
                        if (isset($result2)) {
                            echo   $result[0].'~'.$result[1].'~'.$result[2].'~'.$result[3].'~'.$result[4].'~'.$result2[2].'~'.$result2[6].';'; 
                        }
                        $transactionId = $result;
                    
                    });





                    
                }
                $transactionId = $result;
            
            });



          } 
    }
    $transactionId = $result;

});



?>