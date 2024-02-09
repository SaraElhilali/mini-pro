<?php
require 'conn.php';

// Vérifier si l'identifiant est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête SQL paramétrée pour obtenir les données de l'enregistrement correspondant
    $requete = "SELECT * FROM note WHERE id = ?";
    
    // Utilisation d'une requête préparée pour éviter les injections SQL
    $stmt = mysqli_prepare($conn, $requete);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        echo "<form method='POST' action='Accueil1.php'>";
        echo "<input type='hidden' name='id' value='" . $id . "'>";
        echo "<label for='Note'>Note:</label>";
        echo "<input type='number' name='Note' value='" . htmlspecialchars($row['Note']) . "'><br>";
        echo "<label for='nom'>Nom:</label>";
        echo "<input type='text' name='nom' value='" . htmlspecialchars($row['nom']) . "'><br>";
        echo "<label for='matière'>Matière:</label>";
        echo "<input type='text' name='matière' value='" . htmlspecialchars($row['matière']) . "'><br>";
        echo "<label for='filière'>Filière:</label>";
        echo "<input type='text' name='filière' value='" . htmlspecialchars($row['filière']) . "'><br>";
        echo "<label for='Date'>Date:</label>";
        echo "<input type='date' name='Date' value='" . htmlspecialchars($row['Date']) . "'><br>";
        echo "<button type='submit'>Enregistrer les modifications</button>";
        echo "</form>";

    } else {
        echo "Erreur lors de la récupération des données.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Identifiant non fourni.";
}
?>
