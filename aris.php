<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[94m            Jangan lupa tersenyum              \n";
echo "\e[91m FORMAT NOMOR HP : INDONESIA '62***' , US='1***'\n";
echo "\e[93m SCRIPT GOJEK AUTO REGISTER + AUTO CLAIM VOUCHER\n";
echo "\n";
echo "\e[96m[?] Masukkan Nomor HP Anda (62/1) : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[x] Nomor Telah Terdaftar\n";
    }
  else
    {
    otp:
    echo "\e[96m[!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[91m[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
    {
      else
        {
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!] Trying to redeem Reff :G-MPW4WBM !\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
