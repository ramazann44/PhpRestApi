<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$otherid = $_POST["otherid"];

class Sonuc{
    
    public $tf;
    
}
$sonuc = new Sonuc();

$query = mysqli_query($baglan,"delete from eidostakiplesme where takipedilen = '$uyeid' and takipeden = '$otherid'");

if($query){
    
    $update1 = mysqli_query($baglan,"update eidoskullanicibilgileri set takipci = takipci-1 where id = '$uyeid'");
    $update2 = mysqli_query($baglan,"update eidoskullanicibilgileri set takip = takip-1 where id = '$otherid'");
    
    $sonuc-> tf = true;
    echo(json_encode($sonuc));
    
}
else{
    
    $sonuc-> tf = false;
    echo(json_encode($sonuc));
    
}

?>