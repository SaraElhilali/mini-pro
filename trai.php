<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestnote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $filière = $_POST["filière"];
    $matière = $_POST["matière"];
    $Note = $_POST["Note"];
    $Date = $_POST["Date"];
  

    // Vous devriez utiliser des requêtes préparées pour éviter les attaques par injection SQL
    $sql = "INSERT INTO note (nom,filière,matière,Note,Date) VALUES ('$nom', '  $filière','$matière', '  $Note ',' $Date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nouvel utilisateur ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
    }
}
$conn->close();
?>
