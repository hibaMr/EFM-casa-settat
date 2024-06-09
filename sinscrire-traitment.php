<?php
session_start();
require 'conxDB.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $villeD = $_POST['villeD'];
    $villeA = $_POST['villeA'];
    $nbrePers = $_POST['nbrePers'];
    $dateVoy = $_POST['dateVoy'];

    $statment = $pdo->prepare('SELECT codeVoyage,villeD,villeA,heureDepart FROM descriptionVoyage,voyage WHERE voyage.codDesc = descriptionVoyage.codDesc AND villeD = :villeD AND villeA = :villeA');
    $statment->execute([
        ':villeD' => $villeD,
        ':villeA' => $villeA
    ]);
    $codeVoy = $statment->fetch(PDO::FETCH_ASSOC);

    $_SESSION['codeVoy'] = $codeVoy;

    if(!empty($nbrePers) || !empty($dateVoy) || !empty($codeVoy)){
        $statment1 = $pdo->prepare('INSERT INTO inscription (codeEmp,codeVoyage,nbrePers,dateVoy) VALUES (:codeEmp,:codeVoyage,:nbrePers,:dateVoy)');

        $statment1->execute([
            ':codeEmp' => $_SESSION['employe']['codeEmp'],
            ':codeVoyage' => $codeVoy['codeVoyage'],
            ':nbrePers' => $nbrePers,
            ':dateVoy' => $dateVoy
        ]);
        header('Location: listIns.php');

    }
}