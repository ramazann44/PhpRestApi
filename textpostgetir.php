<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];
$posttype = "text";

class Result{
    
    public $tf;
    public $id;
    
}
$result = new Result();

$textpostgetir = mysqli_query($baglan,"select * from eidospostlar where uyeid = '$uyeid' and posttype = '$posttype' order by tarih desc");
$count = mysqli_num_rows($textpostgetir);

if($count > 0){
    
   $sayac = 0;
    
    echo("[");
    
    while($ata = mysqli_fetch_assoc($textpostgetir)){
        
        $sayac += 1;
        
        $result-> tf = true;
        $result-> id = $ata["id"];
        
        echo(json_encode($result));
        
        if($count > $sayac){
            
            echo(",");
            
        }
    }
        
        echo("]");
        
}

else{
    
    echo("[");
    
        $result-> tf = false;
        $result-> id = $ata["id"];
        
        echo(json_encode($result));
        
    echo("]");
}

?>