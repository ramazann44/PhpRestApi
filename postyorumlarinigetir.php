<?php

include("ayar.php");

$postid = $_POST["postid"];

$query = mysqli_query($baglan,"select * from eidospostyorumlari where postid = '$postid' order by begenisayisi desc,tarih asc");

class Listele{
    
    public $tf;
    public $yorumid;
    public $yorumsahibiid;
    
}

$listele = new Listele();

$count = mysqli_num_rows($query);

if($count > 0){
    
   $sayac = 0;
    
    echo("[");
    
    while($ata = mysqli_fetch_assoc($query)){
        
        $sayac += 1;
        
        $listele-> tf = true;
        $listele-> yorumid = $ata["id"];
        
        $yorumid1 = $ata["id"];
        $yorumsahibigetir1 = mysqli_query($baglan,"select * from eidospostyorumlari where id = '$yorumid1'");
        $ata2 = mysqli_fetch_assoc($yorumsahibigetir1);
        
        $listele-> yorumsahibiid = $ata2["uyeid"];
        
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
        $listele-> yorumid = $ata["id"];
        
        $yorumid2 = $ata["id"];
        $yorumsahibigetir2 = mysqli_query($baglan,"select * from eidospostyorumlari where id = '$yorumid2'");
        $ata3 = mysqli_fetch_assoc($yorumsahibigetir2);
        
        $listele-> yorumsahibiid = $ata3["uyeid"];
        
        echo(json_encode($listele));
        
    echo("]");
}

?>