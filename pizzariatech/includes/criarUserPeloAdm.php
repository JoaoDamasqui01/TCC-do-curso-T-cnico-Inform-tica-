<?php
        include_once ('conexao.php');

        $idUsuario = mysqli_real_escape_string($conn, $_POST['idUsuario']);
        $idTipoUser = mysqli_real_escape_string($conn, $_POST['idTipoUser']);
        $nomeCompleto = mysqli_real_escape_string($conn, $_POST['nomeCompleto']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);

        if ($idUsuario == 0) {
            $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE cpf = '$cpf'");
            if (mysqli_num_rows($resultado) > 0) {
                header("Location: ../usuariosAdm.php?tipo=erro&msg=Usuario já cadastrado no sistema!");
                exit;
            } else {
                $sql = "INSERT INTO usuarios (idTipoUser, nomeCompleto, senha, cpf) 
                        VALUES ('$idTipoUser', '$nomeCompleto', '$senha', '$cpf')";
                if (mysqli_query($conn, $sql)) {
                    header("Location: ../usuariosAdm.php?tipo=sucesso&mensagem=Seu usuario foi cadastrado com sucesso");
                    exit;
                } else {
                    die("Erro ao cadastrar usuário: " . mysqli_error($conn));
                }
            }
        } else {
            $sql = "UPDATE usuarios SET idTipoUser ='$idTipoUser', nomeCompleto = '$nomeCompleto', senha = '$senha', cpf = '$cpf' WHERE idUsuario = '$idUsuario'";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../usuariosAdm.php?tipo=sucesso&mensagem=O cadastro da conta do usuario foi atualizado com sucesso");
                exit;
            } else {
                die("Erro ao atualizar cadastro: " . mysqli_error($conn));
            }
        }
?>
