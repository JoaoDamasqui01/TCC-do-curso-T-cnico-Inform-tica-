<?php
        include_once('conexao.php');

        if (isset($_GET['idUsuario'])) {
        $idUsuario = mysqli_real_escape_string($conn, $_GET['idUsuario']); // Recuperando e escapando o ID da URL

        // Verificar se o usuário existe
        $sqlCheck = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
        $resultCheck = mysqli_query($conn, $sqlCheck);

        if (mysqli_num_rows($resultCheck) > 0) {
            // Verificar se há pedidos relacionados a este usuário
            $sqlCheckPedidos = "SELECT * FROM pedidos WHERE idUsuarios = $idUsuario";
            $resultCheckPedidos = mysqli_query($conn, $sqlCheckPedidos);

            if (mysqli_num_rows($resultCheckPedidos) > 0) {
                // Se houver pedidos relacionados, não excluir o usuário
                header("Location: ../usuariosAdm.php?tipo=erro&mensagem=Não é possível excluir o usuário, pois há pedidos relacionados.");
                exit;
            }

            // Caso contrário, pode-se excluir o usuário
            $sqlDelete = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";
            if (mysqli_query($conn, $sqlDelete)) {
                header("Location: ../usuariosAdm.php?tipo=sucesso&mensagem=Usuário excluído com sucesso");
            } else {
                header("Location: ../usuariosAdm.php?tipo=erro&mensagem=Erro ao excluir o usuário");
            }
            exit;
        } else {
            // Caso o usuário não exista
            header("Location: ../usuariosAdm.php?tipo=erro&mensagem=Usuário não encontrado");
            exit;
        }
        }

        echo mysqli_error($conn);
?>
