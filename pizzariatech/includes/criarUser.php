<?php

	include_once ('conexao.php');

    $idUsuario = mysqli_real_escape_string($conn, $_POST['idUsuario']);
	$idTipoUser = mysqli_real_escape_string($conn, $_POST['idTipoUser']);
    $nomeCompleto = mysqli_real_escape_string($conn, $_POST['nomeCompleto']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);

    if($idUsuario == 0){
        $resultato = mysqli_query($conn, "SELECT * FROM usuarios WHERE cpf = '$cpf'");
        if (mysqli_num_rows($resultado)>0) {
			header("Location: ../login.php?tipo=erro&msg=Usuario já cadastrado no sistema!");
		}
        else{
			$sql = mysqli_query($conn, "INSERT INTO usuarios (nomeCompleto, idTipoUser, senha, cpf)
										VALUES ('$idTiposUser','$nomeCompleto', '$senha', '$cpf')");
			if (mysqli_query($conn, $sql)) {
					header("Location:../login.php?tipo=sucesso&mensagem=Seu usuario foi cadastrado com sucesso");
				} else {
					header("Location: ../login.php?tipo=erro&mensagem=ERRO usuario não foi cadastrado");
				}
		}
    }else {
        $sql = "UPDATE usuarios SET idTiposUser ='$idTiposUser', nomeCompleto = '$nomeCompleto', senha = '$senha', cpf = '$cpf' WHERE idUsuario = '$idUsuario'";
			if (mysqli_query($conn, $sql)) {
				header("Location: ../login.php?tipo=sucesso&mensagem=O cadastro da conta do usuario foi atualizado com sucesso");
			}
			else{
				header("Location: ../login.php?tipo=erro&mensagem=ERRO-cadastro da conta do usuario não foi atualizado");
			}
    }
    
?>