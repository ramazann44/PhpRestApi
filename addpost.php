<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$posttype = $_POST["posttype"];
$text = $_POST["text"];
$tarih = $_POST["tarih"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$ekle = mysqli_query($baglan,"insert into eidospostlar (uyeid,posttype,text,begeni,yorumsayisi,tarih) values ('$uyeid','$posttype','$text','0','0','$tarih')");

if($ekle){
    
    $result-> tf = true;
    echo(json_encode($result));
    
}
else{
    
    $result-> tf = false;
    echo(json_encode($result));
    
}

?>