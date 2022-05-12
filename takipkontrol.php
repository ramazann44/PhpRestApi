<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$otherid = $_POST["otherid"];

class Sonuc{
    
    public $sonuc;
    
}
$sonuc = new Sonuc();

$takipisteksorgu = mysqli_query($baglan,"select * from eidostakipistekleri where istekatan = '$uyeid' and istekalan = '$otherid'");

$takipisteksay = mysqli_num_rows($takipisteksorgu);

$takiplesmesorgu = mysqli_query($baglan,"select * from eidostakiplesme where takipeden = '$uyeid' and takipedilen = '$otherid'");
    
$takiplesmesay = mysqli_num_rows($takiplesmesorgu);

if($takipisteksay > 0){
    
    $sonuc-> sonuc = "Takip İsteğini Geri Çek";
    echo(json_encode($sonuc));
    
}
else if($takipisteksay < 1 && $takiplesmesay < 1){
    
    $sonuc-> sonuc = "Takip Et";
    echo(json_encode($sonuc));
    
}
else{
    
    $takiplesmesorgu = mysqli_query($baglan,"select * from eidostakiplesme where takipeden = '$uyeid' and takipedilen = '$otherid'");
    
    $takiplesmesay = mysqli_num_rows($takiplesmesorgu);
    
    if($takiplesmesay > 0){
        
        $sonuc-> sonuc = "Takipten Çık";
        echo(json_encode($sonuc));
        
    }
    
}

?>