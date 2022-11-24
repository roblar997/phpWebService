<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con=mysqli_connect("localhost","s349967","","s349967");
$sql=("select * from Severdighet");
$tabell=mysqli_query($con,$sql);
mysqli_close($con);
while ($row=mysqli_fetch_assoc($tabell))
{
$output[]=$row;
}
print(json_encode($output));
?>

