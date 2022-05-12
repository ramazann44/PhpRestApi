<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$postid = $_POST["postid"];
$yorum = $_POST["yorum"];
$tarih = $_POST["tarih"];
$begenisayisi = "0";

class Result{
    
    public $tf;
    
}
$result = new Result();

$yorumekle = mysqli_query($baglan,"insert into eidospostyorumlari (uyeid,postid,yorum,begenisayisi,tarih) values ('$uyeid','$postid','$yorum','$begenisayisi','$tarih')");

if($yorumekle){
    
    $yorumsayisiarttir = mysqli_query($baglan,"update eidospostlar set yorumsayisi = yorumsayisi+1 where id = '$postid'");
    
    if($yorumsayisiarttir){
        
        $result-> tf = true;
        echo(json_encode($result));
        
    }
    
    
}
else{
    
    $result-> tf = false;
    echo(json_encode($result));
    
}

?>