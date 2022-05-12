<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$yorumid = $_POST["yorumid"];
$postid = $_POST["postid"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$yorumusil = mysqli_query($baglan,"delete from eidospostyorumlari where id = '$yorumid' and uyeid = '$uyeid'");

if($yorumusil){
    
    $begenmelerisil = mysqli_query($baglan,"delete from eidospostyorumubegenmeleri where postyorumuid = '$yorumid'");
    
    if($begenmelerisil){
        
        $postyorumazalt = mysqli_query($baglan,"update eidospostlar set yorumsayisi = yorumsayisi-1 where id = '$postid'");
        
        if($postyorumazalt){
            
            $result-> tf = true;
            echo(json_encode($result));
            
        }
        else{
            
            $result-> tf = false;
            echo(json_encode($result));
            
        }
        
    }
    else{
        
        $result-> tf = false;
        echo(json_encode($result));
        
    }
    
}
else{
        
    $result-> tf = false;
    echo(json_encode($result));
        
}

?>