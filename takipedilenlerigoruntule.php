<?php

include("ayar.php");

$uyeid = $_POST["uyeid"];

$query = mysqli_query($baglan,"select * from eidostakiplesme where takipeden = '$uyeid'");

class Listele{
    
    public $tf;
    public $otherid;
    
}

$listele = new Listele();

$count = mysqli_num_rows($query);

if($count > 0){
    
   $sayac = 0;
    
    echo("[");
    
    while($ata = mysqli_fetch_assoc($query)){
        
        $sayac += 1;
        
        $listele-> tf = true;
        $listele-> otherid = $ata["takipedilen"];
        
        echo(json_encode($listele));
        
        if($count > $sayac){
            
            echo(",");
            
        }
    }
        
        echo("]");
        
}

else{
    
    echo("[");
    
        $listele-> tf = false;
        $listele-> otherid = $ata["takipedilen"];
        
        echo(json_encode($listele));
        
    echo("]");
}

?>