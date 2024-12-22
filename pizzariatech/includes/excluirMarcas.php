<?php
    include_once('conexao.php');

    if (isset($_GET['idMarcas'])) {
        $idMarcas = $_GET['idMarcas']; // Recuperando o ID da URL
        
        // Validação de segurança (evitar injeção SQL)
        $idMarcas = mysqli_real_escape_string($conn, $idMarcas);
        // Excluir do banco de dados
        $sql = "DELETE FROM marcas WHERE idMarcas = $idMarcas";

        if (mysqli_query($conn, $sql)) {
            // Redireciona para a página Marcas.php com sucesso
            header("Location: ../MarcasAdm.php?tipo=sucesso&mensagem=Marca excluída com sucesso");
        } else {
            // Redireciona em caso de erro
            header("Location: ../MarcasAdm.php?tipo=erro&mensagem=Erro ao excluir marca");
        }
    } else {
        // Caso o parâmetro idMarcas não seja passado
        header("Location: ../MarcasAdm.php?tipo=erro&mensagem=Marca não encontrada");
    }

    echo mysqli_error($conn);
?>

