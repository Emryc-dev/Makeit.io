<?php
  session_start();

  $host = 'localhost';
  $dbname = 'makeit';
  $user = 'root';
  $password = '';

  try{
    $pdo = new PDO('mysql:host=localhost;dbname=makeit;charset=utf8',$user,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    die("Erreur de connexion: " .$e->getMessage());
  }