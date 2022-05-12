<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$postid = $_POST["postid"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$begenikontrol = mysqli_query($baglan,"select * from eidospostbegenmeleri where begenen = '$uyeid' and postid = '$postid'");

$begenisay = mysqli_num_rows($begenikontrol);

if($begenisay > 0){
    
    $result-> tf = true;
    echo(json_encode($result));
    
}
else{
    
    $result-> tf = false;
    echo(json_encode($result));
    
}

?>