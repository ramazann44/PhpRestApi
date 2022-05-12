<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$kadi = $_POST["kadi"];
$sifre = $_POST["sifre"];
$isim = $_POST["isim"];
$internetsitesi = $_POST["internetsitesi"];
$biyografi = $_POST["biyografi"];
$telefon = $_POST["telefon"];
$cinsiyet = $_POST["cinsiyet"];
$dogumtarihi = $_POST["dogumtarihi"];

class Sonuc{
    
    public $tf;
    
}
$sonuc = new Sonuc();

$kadisorgula1 = mysqli_query($baglan,"select * from eidoskullanicilar where id = '$uyeid' and kullaniciadi = '$kadi'");

$say1 = mysqli_num_rows($kadisorgula1);

$kadisorgula2 = mysqli_query($baglan,"select * from eidoskullanicilar where kullaniciadi = '$kadi'");

$say2 = mysqli_num_rows($kadisorgula2);

if($say1 > 0){
    
    $guncelle1 = mysqli_query($baglan,"update eidoskullanicilar set kullaniciadi = '$kadi',sifre = '$sifre' where id = '$uyeid'"); 
    
    $guncelle2 = mysqli_query($baglan,"update eidoskullanicibilgileri set isim = '$isim',internetsitesi = '$internetsitesi',biyografi = '$biyografi',telefon = '$telefon',cinsiyet = '$cinsiyet',dogumtarihi = '$dogumtarihi' where id = '$uyeid'"); 
    
    $sonuc->tf = true;
    echo(json_encode($sonuc));
    
}
else if($say2 > 0){
    
    $sonuc->tf = false;
    echo(json_encode($sonuc));
    
}
else{
    
    $guncelle1 = mysqli_query($baglan,"update eidoskullanicilar set kullaniciadi = '$kadi',sifre = '$sifre' where id = '$uyeid'"); 
    
    $guncelle2 = mysqli_query($baglan,"update eidoskullanicibilgileri set isim = '$isim',internetsitesi = '$internetsitesi',biyografi = '$biyografi',telefon = '$telefon',cinsiyet = '$cinsiyet',dogumtarihi = '$dogumtarihi' where id = '$uyeid'"); 
    
    $sonuc->tf = true;
    echo(json_encode($sonuc));
    
}

?>