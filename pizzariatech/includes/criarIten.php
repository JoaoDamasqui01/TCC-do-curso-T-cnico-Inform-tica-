<?php
	include_once('conexao.php');

	$idItens = mysqli_real_escape_string($conn, $_POST['idItens']);
	$idFornecedores = mysqli_real_escape_string($conn, $_POST['idFornecedores']);
	$idMarcas = mysqli_real_escape_string($conn, $_POST['idMarcas']);
	$idTiposItens = mysqli_real_escape_string($conn, $_POST['idTiposItens']);
	$nomeItem = mysqli_real_escape_string($conn, $_POST['nomeItem']);



	if ($idItens > 0) {
		// ... (validation and sanitization as before)
		$idItens = $_POST['idItens'];

		$sql = "UPDATE itens SET idTiposItens = '$idTiposItens', idFornecedores = '$idFornecedores', idMarcas = '$idMarcas', , nomeItem = '$nomeItem'";

		if(mysqli_query($conn, $sql)){
			header("Location: ../iten.php?tipo=sucesso&mensagem=Item criado com sucesso");
        } else {
            header("Location: ../iten.php?tipo=erro&mensagem=Erro ao Criar o item");
        }
		
		
	} else {

		$sql = "INSERT INTO itens (idTiposItens, idFornecedores, idMarcas, nomeItem) VALUES ('$idTiposItens', '$idFornecedores', '$idMarcas', '$nomeItem')";
		if (mysqli_query($conn, $sql)) {
            header("Location: ../iten.php?tipo=sucesso&mensagem=Item cadastrada com sucesso");
        } else {
            header("Location: ../iten.php?tipo=erro&mensagem=Erro ao cadastrar o Item");
        }
	}

	echo mysqli_error($conn);
	
?>