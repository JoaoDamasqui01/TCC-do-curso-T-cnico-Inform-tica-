<?php
    include_once('conexao.php');

    if (isset($_GET['idEntregas'])) {
        $idEntregas = $_GET['idEntregas']; // Recuperando o ID da URL
        
        $idEntregas = mysqli_real_escape_string($conn, $idEntregas);

        $sql = "DELETE FROM entregas WHERE idEntregas = $idEntregas";

        if (mysqli_query($conn, $sql)) {
            // Redireciona para a página Marcas.php com sucesso
            header("Location: ../EntregasAdm.php?tipo=sucesso&mensagem=Entrega excluída com sucesso");
        } else {
            // Redireciona em caso de erro
            header("Location: ../EntregasAdm.php?tipo=erro&mensagem=Erro ao excluir Entrega");
        }
    } else {
        // Caso o parâmetro idEntregas não seja passado
        header("Location: ../EntregasAdm.php?tipo=erro&mensagem=Entrega não encontrada");
    }

    echo mysqli_error($conn);
?>

