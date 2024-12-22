<?php
    include_once('conexao.php');

    if (isset($_GET['idFornecedores'])) {
        $idFornecedores = $_GET['idFornecedores']; // Recuperando o ID da URL
        
        // Validação de segurança (evitar injeção SQL)
        $idFornecedores = mysqli_real_escape_string($conn, $idFornecedores);
        // Excluir do banco de dados
        $sql = "DELETE FROM fornecedores WHERE idFornecedores = $idFornecedores";

        if (mysqli_query($conn, $sql)) {
            // Redireciona para a página Fornecedores.php com sucesso
            header("Location: ../FornecedoresAdm.php?tipo=sucesso&mensagem=Marca excluída com sucesso");
        } else {
            // Redireciona em caso de erro
            header("Location: ../FornecedoresAdm.php?tipo=erro&mensagem=Erro ao excluir marca");
        }
    } else {
        header("Location: ../FornecedoresAdm.php?tipo=erro&mensagem=Marca não encontrada");
    }

?>