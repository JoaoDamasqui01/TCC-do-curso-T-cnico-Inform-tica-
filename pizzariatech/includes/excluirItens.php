<?php
    include_once('conexao.php');

    if (isset($_GET['idItens'])) {
        $idItens = $_GET['idItens']; // Recuperando o ID da URL
        
        // Validação de segurança (evitar injeção SQL)
        $idItens = mysqli_real_escape_string($conn, $idItens);
        // Excluir do banco de dados
        $sql = "DELETE FROM itens WHERE idItens = $idItens";

        if (mysqli_query($conn, $sql)) {
            // Redireciona para a página Fornecedores.php com sucesso
            header("Location: ../itenAdm.php?tipo=sucesso&mensagem=Item cadastrado com sucesso");
        } else {
            // Redireciona em caso de erro
            header("Location: ../itenAdm.php?tipo=erro&mensagem=Erro ao excluir Item");
        }
    } else {
        header("Location: ../itenAdm.php?tipo=erro&mensagem=Item não encontrada");
    }

?>