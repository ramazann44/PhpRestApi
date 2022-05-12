<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$yorumid = $_POST["yorumid"];

class Result{
    
    public $sonuc;
    
}
$result = new Result();

$begenikonrol = mysqli_query($baglan,"select * from eidospostyorumubegenmeleri where begenen = '$uyeid' and postyorumuid = '$yorumid'");
$say = mysqli_num_rows($begenikonrol);

if($say > 0){
    
    $begeniyisil = mysqli_query($baglan,"delete from eidospostyorumubegenmeleri where begenen = '$uyeid' and postyorumuid = '$yorumid'");
    $yorumbegeniazalt = mysqli_query($baglan,"update eidospostyorumlari set begenisayisi = begenisayisi-1 where id = '$yorumid'");
    
    $result-> sonuc = "begeni kaldirildi.";
    echo(json_encode($result));
    
}
else{
    
    $yorumbegen = mysqli_query($baglan,"insert into eidospostyorumubegenmeleri (begenen,postyorumuid) values ('$uyeid','$yorumid')");
    $yorumbegeniarttir = mysqli_query($baglan,"update eidospostyorumlari set begenisayisi = begenisayisi+1 where id = '$yorumid'");
    
    $result-> sonuc = "yorum begenildi.";
    echo(json_encode($result));
    
}



?>