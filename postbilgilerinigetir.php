<?php

include("ayar.php");

$postid = $_POST["postid"];

class Result{
    
    public $tf;
    public $posttype;
    public $posttext;
    public $begenisayisi;
    public $yorumsayisi;
    public $tarih;
    
}
$result = new Result();

$bilgilerigetir = mysqli_query($baglan,"select * from eidospostlar where id = '$postid'");
$ata = mysqli_fetch_assoc($bilgilerigetir);
$result-> tf = true;
$result-> posttype = $ata["posttype"];
$result-> posttext = $ata["text"];
$result-> begenisayisi = $ata["begeni"];
$result-> yorumsayisi = $ata["yorumsayisi"];
$result-> tarih = $ata["tarih"];
echo(json_encode($result));



?>