<?php
try {
$con=mysqli_connect('localhost','s349967','','s349967');
$latInp=$_REQUEST['lat'];
$lngInp=$_REQUEST['lng'];
$gateadresseInp=$_REQUEST['gateadresse'];
$beskrivelseInp=$_REQUEST['beskrivelse'];

$lng=(float) $lngInp;
$lat=(float) $latInp;
$gateadresse=(string)$gateadresseInp;
$beskrivelse=(string)$beskrivelseInp;

   $sql=mysqli_query($con,"insert into s349967.Severdighet (lng,lat,gateadresse,beskrivelse) values('$lng','$lat','$gateadresse','$beskrivelse');");
   header("HTTP/1.1 200 OK");
   print(json_encode("OK"));
}
catch(Exception $e) {
    header("HTTP/1.1  400 Bad Request");
    print(json_encode("ERROR"));
}
finally{
    mysqli_close($con);
}
 

?>
