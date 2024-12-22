<?php
	include_once('conexao.php');

	// Receber os dados do formulário e validar
	$idPedidos = mysqli_real_escape_string($conn, $_POST['idPedidos']);
	$idFormasPagamentos = mysqli_real_escape_string($conn, $_POST['idFormasPagamentos']);
	$idUsuarios = mysqli_real_escape_string($conn, $_POST['idUsuarios']);
	$localizacao = mysqli_real_escape_string($conn, $_POST['localizacao']);
	$dataPedido = mysqli_real_escape_string($conn, $_POST['dataPedido']);

	// Verificar se é uma nova inserção ou atualização
	if ($idPedidos == 0) {
		// Inserir novo pedido
		$sql = "INSERT INTO pedidos (idFormasPagamentos, idUsuarios, localizacao, dataPedido) 
				VALUES ('$idFormasPagamentos', '$idUsuarios', '$localizacao', '$dataPedido')";

		if (mysqli_query($conn, $sql)) {
			$idPedido = mysqli_insert_id($conn); // Obter o ID do pedido recém-inserido
			header("Location: ../PedidosFinal.php?tipo=sucesso&mensagem=Pedido cadastrado com sucesso!&idPedido=$idPedido");
			exit;
		} else {
			// Tratar erro de inserção
			echo "Erro ao cadastrar o pedido: " . mysqli_error($conn);
		}
	} else {
		// Atualizar pedido existente
		$sqlAtualizar = "UPDATE pedidos 
						SET idFormasPagamentos = '$idFormasPagamentos', 
							idUsuarios = '$idUsuarios', 
							localizacao = '$localizacao', 
							dataPedido = '$dataPedido' 
						WHERE idPedidos = '$idPedidos'";

		if (mysqli_query($conn, $sqlAtualizar)) {
			header("Location: ../PedidosFinal.php?tipo=sucesso&mensagem=Pedido atualizado com sucesso!");
			exit;
		} else {
			// Tratar erro de atualização
			echo "Erro ao atualizar o pedido: " . mysqli_error($conn);
		}
	}
?>
