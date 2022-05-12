<?php

include("ayar.php");

$email = $_POST["email"];
$kullanicisifre = $_POST["sifre"];
$durum = 1;

class Uye{
    
    public $tf;
    public $id;
    public $mailadres;
    public $kadi;
    public $sifre;
    
}

$uye = new Uye();

$kontrol = mysqli_query($baglan,"select * from eidoskullanicilar where email = '$email' and sifre = '$kullanicisifre' and durum = '$durum' ");

$say = mysqli_num_rows($kontrol);

$fetch = mysqli_fetch_assoc($kontrol);

if($say > 0){
    
    $uye->tf = true;
    $uye->id = $fetch["id"];
    $uye->mailadres = $fetch["email"];
    $uye->kadi = $fetch["kullaniciadi"];
    $uye->sifre = $fetch["sifre"];
    echo (json_encode($uye));
    
}
else{
    
    $uye->tf = false;
    $uye->id = "";
    $uye->mailadres = "";
    $uye->kadi = "";
    $uye->sifre = "";
    echo (json_encode($uye));
    
}

    


?>