<?php
    include_once ('conexao.php');


    $idPedidosItens = mysqli_real_escape_string($conn, $_POST['idPedidosItens']);
    $idPedidos = mysqli_real_escape_string($conn, $_POST['idPedidos']);
    $idItens = mysqli_real_escape_string($conn, $_POST['idItens']);
    $idEntregas = mysqli_real_escape_string($conn, $_POST['idEntregas']);
    $qtde = isset($_POST['qtde']) ? (float) $_POST['qtde'] : 0; // Quantidade, convertida para float
    $precoUnitario = isset($_POST['precoUnitario']) ? (float) $_POST['precoUnitario'] : 0; // Preço unitário, convertido para float
    $precoTotal = $qtde * $precoUnitario;



    if($idPedidosItens == 0){
			$sql = "INSERT INTO pedidositens (idItens , idPedidos, idEntregas, qtde, precoUnitario, precoTotal) VALUES ('$idItens ', '$idPedidos ', '$idEntregas', '$qtde', '$precoUnitario', '$precoTotal')";
			if (mysqli_query($conn, $sql)) {
					header("Location:../PedidosFinal.php?tipo=sucesso&mensagem=Seu Pedido Final realizado com sucesso");
				} else {
					//header("Location: ../PedidosFinal.php?tipo=erro&mensagem=ERRO Pedido Final Não foi cadastrado");
				}
	
    }else {
        $sql = "UPDATE pedidositens SET idItens = '$idItens', idPedidos = '$idPedidos', idEntregas = '$idEntregas', qtde = '$qtde', precoUnitario = '$precoUnitario', precoTotal = '$precoTotal' WHERE idPedidosItens = '$idPedidosItens'";
			if (mysqli_query($conn, $sql)) {
				header("Location: ../PedidosFinal.php?tipo=sucesso&mensagem=O cadastro do Pedido Final foi atualizado com sucesso");
			}
			else{
				header("Location: ../PedidosFinal.php?tipo=erro&mensagem=ERRO-cadastro do Pedido Final não foi atualizado");
			}
    }

    echo mysqli_error($conn);
?>