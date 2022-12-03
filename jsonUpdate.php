<?php
try {
$con=mysqli_connect('localhost','s349967','','s349967');

if(!(isset($_REQUEST['lat']) && isset($_REQUEST['lng']) && isset($_REQUEST['gateadresse'])&&isset($_REQUEST['beskrivelse']))){
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

    $lng12digits = round($lng,12);
    $lat12digits = round($lat,12);

   $sql=mysqli_query($con,"UPDATE s349967.Severdighet SET gateadresse='$gateadresse',beskrivelse='$beskrivelse' WHERE ROUND(lat,12)='$lat12digits' AND ROUND(lng,12)='$lng12digits';");
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
