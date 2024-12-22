<?php
    include_once('conexao.php');

    if (isset($_GET['idPedidosItens'])) {
        $idPedidosItens = $_GET['idPedidosItens']; // Recuperando o ID da URL
        
        // Validação de segurança (evitar injeção SQL)
        $idPedidosItens = mysqli_real_escape_string($conn, $idPedidosItens);
        // Excluir do banco de dados
        $sql = "DELETE FROM pedidositens WHERE idPedidosItens = $idPedidosItens";

        if (mysqli_query($conn, $sql)) {
            // Redireciona para a página Marcas.php com sucesso
            header("Location: ../PedidosAdm.php?tipo=sucesso&mensagem=Pedido Final foi excluída com sucesso");
        } else {
            // Redireciona em caso de erro
            header("Location: ../PedidosAdm.php?tipo=erro&mensagem=Erro ao excluir Pedido Final");
        }
    } else {
        // Caso o parâmetro idPedidos não seja passado
        header("Location: ../PedidosAdm.php?tipo=erro&mensagem=Pedido Final foi não encontrada");
    }
?>