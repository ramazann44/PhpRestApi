<?php

include("ayar.php");

$kullaniciadi = $_GET["kadi"];

$query = mysqli_query($baglan,"select * from eidoskullanicilar where kullaniciadi like '%$kullaniciadi%'");

class Ara{
    
    public $tf;
    public $id;
    public $kadi;
    public $resim;
    
}

$ara = new Ara();

$count = mysqli_num_rows($query);

if($count > 0){
    
   $sayac = 0;
    
    echo("[");
    
    while($ata = mysqli_fetch_assoc($query)){
        
        $sayac += 1;
        
        $ara-> tf = true;
        $ara-> id = $ata["id"];
        $ara-> kadi = $ata["kullaniciadi"];
        $ara-> resim = $ata["resim"];
        
        echo(json_encode($ara));
        
        if($count > $sayac){
            
            echo(",");
            
        }
    }
        
        echo("]");
        
}

else{
    
    echo("[");
    
        $ara-> tf = false;
        $ara-> id = $ata["id"];
        $ara-> kadi = $ata["kullaniciadi"];
        $ara-> resim = $ata["resim"];
        
        echo(json_encode($ara));
        
    echo("]");
}

?>