<?php
    include_once("includes\conexao.php");

    session_start();
	
	if(!isset($_SESSION['idUsuarioLogado'])){

		header("Location: login.php?tipo=erro&msg=Você precisa estar logado!");
	}
?>

<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="estilo\areaAdm.css">
    <title>Area do Administrador</title>
</head>
<body>


    <?php
        include_once("includes\menuAdm.php");
    ?>
  

    <header>
        <div class="row alinhar">
            <div class="col-md-5 logo">
                <img src="imagem\pizzaLogo.png" alt="">
            </div>
            <div class="col-md-6 boxPai">
                <a class="box" href="cadastrarAdm.php">
                    <i class="bi bi-clipboard2-check-fill"></i><br>
                    <span class="boxTitulo">CADASTRAR</span>
                </a>
                <a class="box" href="usuariosAdm.php">
                    <i class="bi bi-person-circle"></i><br>
                    <span class="boxTitulo">USUARIOS</span>
                </a>
            </div>
        </div>
    </header>




    

    
</body>
</html>