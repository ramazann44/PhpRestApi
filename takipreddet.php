<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$otherid = $_POST["otherid"];

class Sonuc{
    
    public $sonuc;
    
}
$sonuc = new Sonuc();

$isteksil = mysqli_query($baglan,"delete from eidostakipistekleri where istekatan = '$otherid' and istekalan = '$uyeid'");

if($isteksil){
    
    $sonuc-> sonuc = "İstek Reddedildi";
    echo(json_encode($sonuc));
    
}


?>