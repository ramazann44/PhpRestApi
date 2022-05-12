<?php

include("ayar.php");

$yorumid = $_POST["yorumid"];

class Result{
    
    public $tf;
    public $uyeid;
    public $postid;
    public $yorumtext;
    public $begenisayisi;
    public $tarih;
    
}
$result = new Result();

$sorgula = mysqli_query($baglan,"select * from eidospostyorumlari where id = '$yorumid'");
$ata = mysqli_fetch_assoc($sorgula);

if($ata){
    
    $result-> tf = true;
    $result-> uyeid = $ata["uyeid"];
    $result-> postid = $ata["postid"];
    $result-> yorumtext = $ata["yorum"];
    $result-> begenisayisi = $ata["begenisayisi"];
    $result-> tarih = $ata["tarih"];
    
    echo(json_encode($result));
    
}
else{
    
    $result-> tf = false;
    $result-> uyeid = $ata["uyeid"];
    $result-> postid = $ata["postid"];
    $result-> yorumtext = $ata["yorum"];
    $result-> begenisayisi = $ata["begenisayisi"];
    $result-> tarih = $ata["tarih"];
    
    echo(json_encode($result));
    
}

?>