<?php
$con=mysqli_connect('localhost','s349967','','s349967');
$lngInp=$_REQUEST['lng'];
$latInp=$_REQUEST['lat'];
$gateadresseInp=$_REQUEST['gateadresse'];
$beskrivelseInp=$_REQUEST['beskrivelse'];

$lng=(float) $lngInp;
$lat=(float) $latInp;
$gateadresse=(string)$gateadresseInp;
$beskrivelse=(string)$beskrivelseInp;

$sql=mysqli_query($con,"insert into Severdighet (lng,lat,gateadresse,beskrivelse) values ('$lng','$lat','$gateadresse',>mysqli_close($con);
?>


