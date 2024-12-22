<?php
    include_once("conexao.php");

    // Pegando os dados do formulário
    $marcasProdutos = mysqli_real_escape_string($conn, $_POST['marcasProdutos']);

    // Verificar se existe um ID para atualizar
    if (isset($_POST['idMarcas']) && !empty($_POST['idMarcas'])) {
        // Atualizar
        $idMarcas = $_POST['idMarcas']; // Pega o ID da marca a ser editada

        $sql = "UPDATE marcas SET marcasProdutos = '$marcasProdutos' WHERE idMarcas = '$idMarcas'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../Marcas.php?tipo=sucesso&mensagem=Marca atualizada com sucesso");
        } else {
            header("Location: ../Marcas.php?tipo=erro&mensagem=Erro ao atualizar a marca");
        }
    } else {
        // Inserir
        $sql = "INSERT INTO marcas (marcasProdutos) VALUES ('$marcasProdutos')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../Marcas.php?tipo=sucesso&mensagem=Marca cadastrada com sucesso");
        } else {
            header("Location: ../Marcas.php?tipo=erro&mensagem=Erro ao cadastrar a marca");
        }
    }
?>
