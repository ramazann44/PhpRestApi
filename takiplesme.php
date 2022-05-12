<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$otherid = $_POST["otherid"];

class Sonuc{
    
    public $sonuc;
    
}
$sonuc = new Sonuc();

$takiplesmesorgu = mysqli_query($baglan,"select * from eidostakipistekleri where istekatan = '$uyeid' and istekalan = '$otherid'");

$takiplesmesay = mysqli_num_rows($takiplesmesorgu);

if($takiplesmesay > 0){
    
    $takipistegisil = mysqli_query($baglan,"delete from eidostakipistekleri where istekatan = '$uyeid' and istekalan = '$otherid'");
    
    $sonuc-> sonuc = "İstek Geri Alındı";
    echo(json_encode($sonuc));
    
}
else{
    
    $takiplesmesorgu = mysqli_query($baglan,"select * from eidostakiplesme where takipeden = '$uyeid' and takipedilen = '$otherid'");

    $takipsay = mysqli_num_rows($takiplesmesorgu);

    if($takipsay > 0){
        
        $takibisil = mysqli_query($baglan,"delete from eidostakiplesme where takipeden = '$uyeid' and takipedilen = '$otherid'");
        
        $update1 = mysqli_query($baglan,"update eidoskullanicibilgileri set takip = takip-1 where id = '$uyeid'");
        $update2 = mysqli_query($baglan,"update eidoskullanicibilgileri set takipci = takipci-1 where id = '$otherid'");
        
        $sonuc-> sonuc = "Takipten Çıkıldı";
        echo(json_encode($sonuc));
        
    }
    else{
        
        $takipistegiat = mysqli_query($baglan,"insert into eidostakipistekleri (istekatan,istekalan) values ('$uyeid','$otherid')");
    
        $sonuc-> sonuc = "Takip İsteği Atıldı";
        echo(json_encode($sonuc));
        
    }
    
}

?>