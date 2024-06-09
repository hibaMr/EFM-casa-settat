<?php
session_start();
require 'conxDB.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if(!empty($user) || !empty($pwd)){
        $statment = $pdo->prepare('SELECT * FROM employe WHERE user = :user AND pwd = :pwd');
        $statment->execute([
            ':user' => $user,
            ':pwd' => $pwd
        ]);
        $employeConnecter = $statment->fetch(PDO::FETCH_ASSOC);
        if($employeConnecter){
            $_SESSION['employe'] = $employeConnecter;
            header('Location: sinscrire.php');
        }else{
            header('Location : connEmp.php');
        }
    }
}