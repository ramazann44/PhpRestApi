<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$yorumid = $_POST["yorumid"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$begenikonrol = mysqli_query($baglan,"select * from eidospostyorumubegenmeleri where begenen = '$uyeid' and postyorumuid = '$yorumid'");
$say = mysqli_num_rows($begenikonrol);

if($say > 0){
    
    $result-> tf = true;
    echo(json_encode($result));
    
}
else{
    
    $result-> tf = false;
    echo(json_encode($result));
    
}

?>