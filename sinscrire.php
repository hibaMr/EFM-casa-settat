<?php
session_start();
if(!isset($_SESSION['employe'])){
    header('Location: connEmp.php');
    exit;
}else{
require 'conxDB.php';
$statment = $pdo->prepare('SELECT * FROM ville');
$statment->execute();
$villes = $statment->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>A Stagiaire</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        .body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            line-height: 1.5;
            min-height: 100vh;
            background: #f3f3f3;
            flex-direction: column;
            margin: 0;
        }

        .main {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 500px;
            text-align: center;
            margin-top:20px;
        }

        h1 {
            color: #4CAF50;
        }

        label {
            display: block;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
            color: #555;
            font-weight: bold;
        }

        input, select {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: none;
            color: white;
            cursor: pointer;
            background-color: #4CAF50;
            width: 100%;
            font-size: 16px;
        }
    </style>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <?php require 'menu.php'; ?>
    <div class="body">
        <div class="main">
        <h1>Inserer un Nouveau Stagiaire</h1>
        <form action="sinscrire-traitment.php" method="POST">
            
            <label for="villeD">ville départ</label>
            <select name="villeD" id="villeD">
                <?php foreach($villes as $ville): ?>
                <option value="<?php echo $ville['codeVille'];?>"><?php echo $ville['ville'];?></option>
                <?php endforeach;?>
            </select>
            

            <label for="villeA">ville d'arrivé</label>
            <select name="villeA" id="villeA">
                <?php foreach($villes as $ville): ?>
                <option value="<?php echo $ville['codeVille'];?>"><?php echo $ville['ville'];?></option>
                <?php endforeach;?>
                
            </select>

            <label for="dateVoy">date de voyage</label>
            <input type="date" id="dateVoy" name="dateVoy" placeholder="Entrer la date de voyage">

            <label for="nbrePers">nombre de personnes</label>
            <input type="number" id="nbrePers" name="nbrePers" placeholder="Entrer le nombre de personnes">

            <button type="submit" name="ajouter">Ajouter</button>
        </form>
    </div>
    </div>
    
</body>
</html>
<?php
}
?>