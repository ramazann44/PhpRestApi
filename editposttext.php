<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$postid = $_POST["postid"];
$newposttext = $_POST["posttext"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$updateposttext = mysqli_query($baglan,"update eidospostlar set text = '$newposttext' where id = '$postid' and uyeid = '$uyeid'");

if($updateposttext){
    
    $result-> tf = true;
    echo(json_encode($result));
    
}
else{
    
    $result-> tf = false;
    echo(json_encode($result));
    
}

?>