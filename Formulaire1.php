<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'évaluation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding:0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 50px 70px 50px ;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
        flex-direction: column; /* Pour aligner les éléments verticalement */
         align-items: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 17px;
        }

        input {
            width: 110%;
            padding: 8px;
            margin-bottom: 6px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
        }
     
        button {
            width: 100%;
         
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: auto;
              margin-right: auto;
              font-size: 17px;
        }

        button:hover {
            background-color: #808080;
        }
    </style>
</head>
<body>

       <form action="con2.php" method="POST">
        <label for="nom">Nom de l'étudiant :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="filière">filière :</label>
        <input type="text" id="filière" name="filière" required>

        <label for="matière">matière :</label>
        <input type="text" id="matière" name="matière" required>
        <label for="Note">Note :</label>
        <input type="number" id="Note" name="Note" min="0" max="20" required>
        <br>
        <label for="date">Date de creation </label>
        <input type="date" id="Date" name="Date" required>
       </div>
    </div>
       
 
  
        <button type="submit" class="bou" href="con2.php">Valider</button>
    </form>

</body>
</html>
