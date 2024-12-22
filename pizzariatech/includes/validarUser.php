<?php
    include_once('conexao.php');
    session_start();

    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);

    $sql = "SELECT * FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $dados = mysqli_fetch_assoc($result);

        $_SESSION['idUsuarioLogado'] = $dados['idUsuario'];
        $_SESSION['nomeUsuarioLogado'] = $dados['nomeCompleto'];
        $_SESSION['cpfUsuarioLogado'] = $dados['cpf'];
        $_SESSION['tipoUserUsuarioLogado'] = $dados['idTipoUser'];

        header("Location: ../login.php?tipo=sucesso&mensagem=Credencias Válidas!");

        if ($dados['idTipoUser'] == 1) {
            header("Location: ../home.php");
        } else {
            header("Location: ../areaAdm.php");
        } 

    } else {
        header("Location: ../login.php?tipo=erro&mensagem=Login e/ou senha inválidos!");
    }
?>