<?php
include_once("conexao.php");

$nomeFornecedor = mysqli_real_escape_string($conn, $_POST['nomeFornecedor']);
$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
$cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
$fone = mysqli_real_escape_string($conn, $_POST['fone']);

if (isset($_POST['idFornecedores']) && !empty($_POST['idFornecedores'])) {
    // Atualizar
    $idFornecedores = $_POST['idFornecedores']; // Pega o ID da marca a ser editada

    $sql = "UPDATE fornecedores SET nomeFornecedor = '$nomeFornecedor', 
                    endereco = '$endereco', cnpj = '$cnpj', fone = '$fone' WHERE idFornecedores = '$idFornecedores'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../Fornecedores.php?tipo=sucesso&mensagem=Fornecedor atualizada com sucesso");
    } else {
        header("Location: ../Fornecedores.php?tipo=erro&mensagem=Erro ao atualizar Fornecedor");
    }
} else {
    // Inserir
    $sql = "INSERT INTO fornecedores (nomeFornecedor, endereco, cnpj, fone) VALUES ('$nomeFornecedor', '$endereco', '$cnpj', '$fone')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../Fornecedores.php?tipo=sucesso&mensagem=Fornecedor cadastrada com sucesso");
    } else {
        header("Location: ../Fornecedores.php?tipo=erro&mensagem=Erro ao cadastrar o fornecedor");
    }
}
?>