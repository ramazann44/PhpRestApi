<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$baslik = $_POST["baslik"];
$resim = $_POST["image"];
$yol = "Eidoskullaniciresimleri/$baslik.jpg";

file_put_contents($yol,base64_decode($resim));
$guncelle = mysqli_query($baglan,"update eidoskullanicilar set resim = '$yol' where id = '$uyeid'");
$x = (array('Result'=>true));
	echo json_encode($x);

    
    
    
    
?>