<?php

include("ayar.php");

$code = rand(10000,100000);

$mail = $_POST["email"];
$kadi = $_POST["kullaniciadi"];
$sifre = $_POST["sifre"];
$durum = 0;

$kontrol = mysqli_query($baglan,"select * from eidoskullanicilar where email = '$mail' or kullaniciadi = '$kadi' ");

$sayi = mysqli_num_rows($kontrol);

if(($sayi) > 0){
    
    $x = (array('result'=>"false"));
	echo json_encode($x);
    
}
else{
    
    $ekle = mysqli_query($baglan,"insert into eidoskullanicilar (email,sifre,kullaniciadi,durum,dogrulamakodu,resim) values ('$mail','$sifre','$kadi','$durum','$code','Eidoskullaniciresimleri/userdefault.png') ");
    
    if($ekle){
        
        $to = $mail;
        $subject = "Mail Aktifleştirme Linkiniz";
        $message = "Merhaba $kadi aşağıdaki linkten mail adresinizi aktif edebilirsiniz 
        https://ramazancelikk.com/EidosUygulama/aktifet.php?mail=$mail&code=$code";
        $sender = "From: <ramamistik43@gmail.com>";
        $gonder = mail($to,$subject,$message,$sender);
        if($gonder){
            
            $x = (array('result'=>"true"));
	        echo json_encode($x);
            
        }
        
        $bilgiekle = mysqli_query($baglan,"insert into eidoskullanicibilgileri (isim,internetsitesi,biyografi,telefon,cinsiyet,dogumtarihi,takipci,takip) values ('$bos','$bos','$bos','$bos','$bos','$bos','0','0')");
        
        
    }
    
}


?>