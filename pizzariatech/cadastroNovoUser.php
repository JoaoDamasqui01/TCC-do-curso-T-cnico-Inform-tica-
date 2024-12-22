<?php
    include_once("includes\conexao.php");

    session_start();


	if (isset($_GET["idUsuario"])) {
		$sql = "SELECT * FROM usuarios WHERE idUsuario = '{$_GET['idUsuario']}'";
		$resultados = mysqli_query($conn, $sql);
		$dados = mysqli_fetch_assoc($resultados);

		$idUsuario = $dados['idUsuario'];
		$nome = $dados['nome'];
		$cpf = $dados['cpf'];
		$senha = $dados['senha'];
		$tipoUser = $dados['tipoUser'];
		

	} else{
		$idUsuario = 0;
		$nome = "";
		$cpf = "";
		$senha = "";
		$tipoUser = "";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"   
 crossorigin="anonymous"></script>
  <title>Novos Usuarios</title>
</head>
<body>


      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Faça cadastro de novos colaboradores</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form action="includes\criarUser.php" method="POST">
          <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="nomeCompleto" required>
                <label for="nomeCompleto">Nome Do Funcionário</label>
          </div>
          <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="cpf" placeholder="3497259828" required>
                <label for="cpf">CPF</label>
          </div>
          <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" name="senha" placeholder="Senha" required>
                <label for="floatingPassword">Senha</label>
          </div>
          <div class="wrap-input100 validate-input mb-3" data-validate="Tipo Usuario!">
                <select name="tipoUser" class="form-select input100" required>
                    <option value="Padrão" <?php if($tipoUser == 'Padrão') echo 'selected'; ?>>Padrão</option>
                    <option value="Administrador" <?php if($tipoUser == 'Administrador') echo 'selected'; ?>>Administrador</option>
                </select>
          </div>

          <button type="submit" class="btn btn-warning">Cadastrar</button>
        </form>
      </div> 
        
</body>
</html>