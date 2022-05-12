<?php

include("ayar.php");

$uyeid = $_GET["uyeid"];

$query1 = mysqli_query($baglan,"select * from eidoskullanicilar where id = '$uyeid' ");
$ata1 = mysqli_fetch_assoc($query1);

$query2 = mysqli_query($baglan,"select * from eidoskullanicibilgileri where id = '$uyeid' ");
$ata2 = mysqli_fetch_assoc($query2);

class Bilgiler{
    
    public $email;
    public $sifre;
    public $kadi;
    public $resim;
    public $isim;
    public $internetsitesi;
    public $biyografi;
    public $telefon;
    public $cinsiyet;
    public $dogumtarihi;
    public $takipci;
    public $takip;
    
}

$bilgiler = new Bilgiler();

$bilgiler->email = $ata1["email"];
$bilgiler->sifre = $ata1["sifre"];
$bilgiler->kadi = $ata1["kullaniciadi"];
$bilgiler->resim = $ata1["resim"];
$bilgiler->isim = $ata2["isim"];
$bilgiler->internetsitesi = $ata2["internetsitesi"];
$bilgiler->biyografi = $ata2["biyografi"];
$bilgiler->telefon = $ata2["telefon"];
$bilgiler->cinsiyet = $ata2["cinsiyet"];
$bilgiler->dogumtarihi = $ata2["dogumtarihi"];
$bilgiler->takipci = $ata2["takipci"];
$bilgiler->takip = $ata2["takip"];
echo(json_encode($bilgiler));

?>