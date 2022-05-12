<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$postid = $_POST["postid"];

class Result{
    
    public $sonuc;
    
}
$result = new Result();

$sorgula = mysqli_query($baglan,"select * from eidospostbegenmeleri where begenen = '$uyeid' and postid='$postid'");
$sorgusay = mysqli_num_rows($sorgula);

if($sorgusay > 0){
    
    $begenikaldir = mysqli_query($baglan,"delete from eidospostbegenmeleri where begenen = '$uyeid' and postid='$postid'");
    $postbegeniazalt = mysqli_query($baglan,"update eidospostlar set begeni = begeni-1 where id = '$postid'");
    $result-> sonuc = "Beğeni Kaldırıldı";
    echo(json_encode($result));
    
}
else{
    
    $begeniekle = mysqli_query($baglan,"insert into eidospostbegenmeleri (begenen,postid) values ('$uyeid','$postid')");
    $postbegeniarttir = mysqli_query($baglan,"update eidospostlar set begeni = begeni+1 where id = '$postid'");
    $result-> sonuc = "Beğeni Eklendi";
    echo(json_encode($result));
    
}

?>