<?php
try {
    $con=mysqli_connect('localhost','s349967','','s349967');

    if(!(isset($_REQUEST['lat']) && isset($_REQUEST['lng']))){
        header("HTTP/1.1  400 Bad Request");
        print(json_encode("ERROR"));
        return;
    }

    $latInp=$_REQUEST['lat'];
    $lngInp=$_REQUEST['lng'];


    $lng=(float) $lngInp;
    $lat=(float) $latInp;


   $sql=mysqli_query($con,"DELETE FROM s349967.Severdighet WHERE ROUND(lat,12)=round($lat,12) AND round(lng,12)=round($lng,12);");
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
