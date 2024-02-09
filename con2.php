<?php
if(isset($_POST['nom'])){
    $nom=$_POST['nom'];}
else{
    $nom="";
}
if(isset($_POST['matière'])){
    $matière=$_POST['matière'];}
else{
    $matière="";
}
if(isset($_POST['filière'])){
    $filière=$_POST['filière'];}
else{
    $filière="";
}
if(isset($_POST['Note'])){
    $Note=$_POST['Note'];
}else {
    $Note="";
}
if(isset($_POST['Date'])){
    $Date=$_POST['Date'];
}else {
    $Date="";
}

require 'conn.php';
$requete="INSERT INTO note (`nom`, `matière`, `filière`, `Note`, `Date`) VALUES ('$nom', '$matière', '$filière', '$Note', '$Date')";
$query=mysqli_query($conn,$requete);
if(isset($query)){
    echo "<h1> insertion avec succ</h1>";
}
else{
    echo "<h1> erreur  insertion </h1>";
}
?>