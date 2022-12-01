<?php
try {
$con=mysqli_connect('localhost','s349967','','s349967');

if(!(isset($_REQUEST['lat']) && isset($_REQUEST['lng']) && isset($gateadresseInp=$_REQUEST['gateadresse'])&&isset($beskrivelseInp=$_REQUEST['beskrivelse']))){
    header("HTTP/1.1  400 Bad Request");
    print(json_encode("Bad Request"));
    mysqli_close($con);
    return;
}

    $latInp=$_REQUEST['lat'];
    $lngInp=$_REQUEST['lng'];
    $gateadresseInp=$_REQUEST['gateadresse'];
    $beskrivelseInp=$_REQUEST['beskrivelse'];
    
    $lng=(float) $lngInp;
    $lat=(float) $latInp;
    $gateadresse=(string)$gateadresseInp;
    $beskrivelse=(string)$beskrivelseInp;



   $sql=mysqli_query($con,"UPDATE s349967.Severdighet SET gateadresse='$gateadresse',beskrivelse='$beskrivelse' WHERE lat='$lat' AND lng='$lng';");
   if($sql){
    header("HTTP/1.1 200 OK");
    print(json_encode("OK"));
   }
   else {
    header("HTTP/1.1 404 Not Found");
    print(json_encode("Not Found"));
   }

}
catch(Exception $e) {
    header("HTTP/1.1  400 Bad Request");
    print(json_encode("Bad Request"));
}
finally{
    mysqli_close($con);
}
 

?>
