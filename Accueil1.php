<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Notes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ajouter-btn, .retour-btn {
            display: block;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            margin-top: 20px;
        }

        .ajouter-btn:hover, .retour-btn:hover {
            background-color: #0056b3;
        }

        .ajouter-btn2, .retour-btn {
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: red;
            border-radius: 5px;
            margin-top: 20px;
        }

        .ajouter-btn2:hover, .retour-btn:hover {
            background-color: #0056b3;
        }

        .ajouter-btn1, .retour-btn {
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #7CFC00;
            border-radius: 5px;
            margin-top: 20px;
        }

        .ajouter-btn1:hover, .retour-btn:hover {
            background-color: #0056b3;
        }

        .bouton-container a {
            margin-right: 10px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style='text-align:center;'>Liste des Notes</h2>

      
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Note</th>
                    <th scope="col">Étudiant</th>
                    <th scope="col">Matière</th>
                    <th scope="col">Filière</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                  require 'conn.php';
                  $requete="SELECT * from note";
                  $query=mysqli_query($conn,$requete);
                  while($rows=mysqli_fetch_assoc($query)){ 
                     $id=$rows['id'];
                    echo "<tr>";
                    echo "<td>{$rows['Note']}</td>";
                    echo "<td>{$rows['nom']}</td>";
                    echo "<td>{$rows['matière']}</td>";
                    echo "<td>{$rows['filière']}</td>";
                    echo "<td>{$rows['Date']}</td>";
                    echo "<td class='bouton-container'>";
                    echo "<a href='modif.php?id=".$id."' class='ajouter-btn1'>Modifier</a>";
                    echo "<a href='supp1.php?id=".$id."' class='ajouter-btn2'>Supprimer</a>";
                    echo "</td>";
                    echo "</tr>";
                }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les champs nécessaires sont présents dans la requête POST
    if (isset($_POST['id'], $_POST['Note'], $_POST['nom'], $_POST['matière'], $_POST['filière'], $_POST['Date'])) {
        $id = $_POST['id'];
        $note = $_POST['Note'];
        $nom = $_POST['nom'];
        $matiere = $_POST['matière'];
        $filiere = $_POST['filière'];
        $date = $_POST['Date'];

        // Requête SQL paramétrée pour mettre à jour les données
        $requete = "UPDATE note SET Note= ?, nom=?, matière=?, filière=?, Date=? WHERE id=?";

        // Utilisation d'une requête préparée pour éviter les injections SQL
        $stmt = mysqli_prepare($conn, $requete);
        mysqli_stmt_bind_param($stmt, 'issssi', $note, $nom, $matiere, $filiere, $date, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Mise à jour réussie.";
        } else {
            echo "Erreur lors de la mise à jour des données : " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Tous les champs requis ne sont pas présents dans la requête POST.";
    }
} else {
    echo "La requête n'est pas de type POST.";
}
?>

                  
              

            </tbody>
        </table>

        <a href="Formulaire1.php" class="ajouter-btn">Ajouter une Note</a>
    </div>
</body>
</html>

