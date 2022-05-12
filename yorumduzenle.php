<?php

include("ayar.php");

$yorumid = $_POST["yorumid"];
$uyeid = $_POST["uyeid"];
$duzenlenmisyorum = $_POST["duzenlenmisyorum"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$yorumuduzenle = mysqli_query($baglan,"update eidospostyorumlari set yorum = '$duzenlenmisyorum' where uyeid = '$uyeid' and id = '$yorumid'");

if($yorumuduzenle){
    
    $result-> tf = true;
    echo(json_encode($result));
    
}
else{
    
    $result-> tf = false;
    echo(json_encode($result));
    
}

?>