<?php
session_start();
include_once 'conexao.php';
$_SESSION['user'] = 'Isadora';

    $ref = filter_input(INPUT_GET, 'ref');
    $consulta = $pdo->prepare("SELECT * FROM teste_nome WHERE id= :ref");
    $consulta-> bindValue(':ref', $ref);
    $consulta->execute();
    $linhas = $consulta -> rowCount();

    foreach($consulta as $mostra): 

    if ($linhas == 0){
        echo '<p>Não existe este arquivo ou o mesmo foi removido!</p>';
    }
    else {
       echo '<h1>'.$mostra['titulo'].'</h1>';
       echo '<p>'.$mostra['materia'].'</p>';
       echo '<h1>'.$mostra['gostei'].' GOSTARAM</h1>';
       if ($_SESSION['gostei'] == 1) {
        echo '<a>Você já participou!</a>';
       }
       else {
        echo '<a href="like.php?ref='.$ref.'">GOSTEI</a>';
       }
    }
    endforeach;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Likes!</title>
    </head>
    <body>


    </body>

</html>