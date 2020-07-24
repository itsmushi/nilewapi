<?php
//editing form values

$tt=[4,4,54];
$tr=["4"=>43, "33"=>"er"];

    print_r($tt);
    //print_r($tr[]);
    
?>










<?php

print_r($_POST);

echo "<br>";
echo "<br>";
$servername = "localhost";
$username = "root";
 $password = "";
 $dbname="nilewapi";

// Create connection
 $conn = mysqli_connect($servername, $username, $password,$dbname);
 
// Check connection
  if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE menu SET price='230' WHERE id='4'";

if(mysqli_query($conn,$sql)){
    echo "checked";
}else {
    echo "Error updating record: " . mysqli_error($conn);
}

//qr=" UPDATE menu SET 'price'=1000    "
//$sql = "UPDATE `menu` SET `price` = \'0\' WHERE `menu`.`id` = 8";
// $sql = "UPDATE menu SET price = 1000 WHERE id=9";

// if(mysqli_query($conn,$sql)){
//     echo "updated";
// }else {
//     echo "Error updating record: " . mysqli_error($conn);

// }

$arr=["a"=>"badd", "1"=>"hskd", "c"=>"skd"];
// array_push($arr,43);

// array_push($arr,4);
$y=1;
print_r($arr);
echo "<br>";
echo $arr[$y];


echo "<br>";
echo "<br>";
echo password_hash("secret", PASSWORD_DEFAULT);

echo "<br>";

$password="secrett";
$hash="$2y$10\$u2htM1xM0bs4etfknHM3uOLEIChrH7k9VDN.AHVLY5qw4jlYm6eXG";
if( password_verify ($password , $hash )){
    echo "yes";
}
?>

<input type="checkbox" name="available" value="1" checked>
                             