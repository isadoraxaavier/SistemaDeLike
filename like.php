<?php
session_start();
include_once 'conexao.php';
$_SESSION['user'] = 'Isadora';

    $referencia = filter_input(INPUT_GET, 'ref');

    $consulta = $pdo->prepare("SELECT * FROM teste_nome WHERE id= :ref");
    $consulta-> bindValue(':ref', $referencia);
    $consulta->execute();
    $linhas = $consulta -> rowCount();

    
    if ($linhas == 0) {
        echo '<script>alert("ERRO: Não foi possivel interar com essa materia, porque ela pode ter sido removida!")</script>';
        echo '<script>window.location="insercao_consulta.php?ref='.$referencia.'"</script>';
    }
    else {
        foreach($consulta as $mostra):
        endforeach;
    }

    $resultado = $mostra['gostei'];
    $gostei = $resultado + 1;

    $altera = $pdo->prepare("UPDATE teste_nome SET gostei = :like WHERE id= :referencia");
    $altera -> bindValue(':like', $gostei);
    $altera -> bindValue(':referencia', $referencia);
    $altera -> execute();

    if ($altera) {
        $_SESSION['gostei'] = '1';
        echo '<script>alert("Sua interacao foi realizada com sucesso!")</script>';
        echo '<script>window.location="insercao_consulta.php?ref='.$referencia.'"</script>';

    }
    else {
        echo '<script>alert("Ocorreu um erro, por favor tente novamente mais tarde!")</script>';
        echo '<script>window.location="insercao_consulta.php?ref='.$referencia.'</script>';

}  