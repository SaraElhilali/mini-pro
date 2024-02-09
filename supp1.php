<?php
require 'conn.php';
$id=$_GET['id'];
$sql="DELETE FROM note Where id='$id'" ;
$query=mysqli_query($conn,$sql);
if(isset($query)){ 
   header("location:Accueil1.php");
}
?>

