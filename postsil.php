<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$postid = $_POST["postid"];

class Result{
    
    public $tf;
    
}
$result = new Result();

$postsil = mysqli_query($baglan,"delete from eidospostlar where id = '$postid' and uyeid = '$uyeid'");

if($postsil){
    
    $begenmelerisil = mysqli_query($baglan,"delete from eidospostbegenmeleri where postid = '$postid'");
    
    if($begenmelerisil){
        
        $yorumlarisil = mysqli_query($baglan,"delete from eidospostyorumlari where postid = '$postid'");
        
        if($yorumlarisil){
            
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

?>