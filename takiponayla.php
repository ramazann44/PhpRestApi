<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$otherid = $_POST["otherid"];

class Sonuc{
    
    public $sonuc;
    
}
$sonuc = new Sonuc();

$takiponayla = mysqli_query($baglan,"insert into eidostakiplesme (takipeden,takipedilen) values ('$otherid','$uyeid')");

if($takiponayla){
    
    $update1 = mysqli_query($baglan,"update eidoskullanicibilgileri set takip = takip+1 where id = '$otherid'");
    $update2 = mysqli_query($baglan,"update eidoskullanicibilgileri set takipci = takipci+1 where id = '$uyeid'");
    
    $isteksil = mysqli_query($baglan,"delete from eidostakipistekleri where istekatan = '$otherid' and istekalan = '$uyeid'");
    
    $sonuc-> sonuc = "İstek Onaylandı";
    echo(json_encode($sonuc));
    
}


?>