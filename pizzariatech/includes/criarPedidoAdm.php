<?php
	include_once('conexao.php');

	// Receber os dados do formulário e validar
	$idPedidos = mysqli_real_escape_string($conn, $_POST['idPedidos']);
	$idFormasPagamentos = mysqli_real_escape_string($conn, $_POST['idFormasPagamentos']);
	$idUsuarios = mysqli_real_escape_string($conn, $_POST['idUsuarios']);
	$localizacao = mysqli_real_escape_string($conn, $_POST['localizacao']);
	$dataPedido = mysqli_real_escape_string($conn, $_POST['dataPedido']);

	// Verificar se é uma nova inserção ou atualização
	if ($idPedidos > 0) {
		$sql = "INSERT INTO pedidos (idFormasPagamentos, idUsuarios, localizacao, dataPedido) VALUES ( '$idFormasPagamentos', '$idUsuarios', '$localizacao', '$dataPedido')";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_execute($stmt);
		if (mysqli_stmt_affected_rows($stmt) > 0) {
			header("Location: ../PedidosFinalAdm.php?tipo=sucesso&mensagem=Pedido cadastrado com sucesso!");
		} else {
			// Tratar erro de inserção
			echo "Erro ao cadastrar o pedido: " . mysqli_error($conn);
		}
		mysqli_stmt_close($stmt);
	} else {
		// Atualizar pedido existente
		$sqlAtualizar = "UPDATE pedidos SET idFormasPagamentos = '$idFormasPagamentos', idUsuarios = '$idUsuarios', localizacao = '$localizacao',dataPedido = '$dataPedido' WHERE idPedidos = '$idPedidos'";
		if (mysqli_query($conn, $sqlAtualizar)) {
			header("Location: ../PedidosFinalAdm.php?tipo=sucesso&mensagem=Pedido atualizado com sucesso!");
			exit;
		} else {
			header("Location: ../PedidosFinalAdm.php?tipo=erro&mensagem=Erro ao atualizar o pedido.");
			exit;
		}
	}

	echo mysqli_error($conn);

?>
