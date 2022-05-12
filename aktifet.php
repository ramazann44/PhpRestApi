<?php

include("ayar.php");

$mail = $_GET["mail"];
$code = $_GET["code"];

$kontrol = mysqli_query($baglan,"select * from eidoskullanicilar where email = '$mail' and durum = '0' and dogrulamakodu = '$code' ");

$say = mysqli_num_rows($kontrol);

if($say > 0){
    
    $guncelle = mysqli_query($baglan,"update eidoskullanicilar set durum = '1' where email = '$mail' and dogrulamakodu = '$code' ");
    
    if($guncelle){
        
        $x = (array('result'=>"Hesabiniz Basariyla Aktiflestirildi."));
	    echo json_encode($x);
        
    }
    
}
else{
    
        $x = (array('result'=>false));
	    echo json_encode($x);
    
}

?>