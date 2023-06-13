<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "test2";

 try{
    // conexão sem a porta
     $pdo = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados realizada com sucesso!";
 }catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado " . $err->getMessage();
 }
 
