<?php
    include_once("includes/conexao.php");
?>

<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilo\login.css">
    <title>Cadastro usuarios</title>
</head>

<style>

img {
    /* font-size: 23px; */
    width: 114%;
}
</style>
<body style="background: rgba(204, 56, 56, 1);">

    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle card" >
            <div class="row d-flex justify-content-space-around ">
                <div class="col-md-6">
                    <img src="imagem\pizzaLogo.png" alt="">
                </div>
                <div class="col-md-6 mt-4">
                    
                    <div class="modal-header p-5 pb-4 d-flex justify-content-center border-bottom-0">
                        <h2 class="fw-bold mb-0 fs-2">Login</h2>
                    </div>


                        <?php
                                if (isset($_GET['mensagem'])) {
                                    
                                    if($_GET['tipo']=='sucesso'){
                                        echo '<div class="alert alert-success" role="alert">
                                                ' . $_GET['mensagem'] . '
                                            </div>';
                                    }
                                    else{
                                        echo '<div class="alert alert-danger" role="alert">
                                                ' . $_GET['mensagem'] . '
                                            </div>';
                                    }
                                }
                        ?>
                
                    
                    <div class="modal-body p-5 pt-0">
                        <form class="" action ="includes/validarUser.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" name="cpf" placeholder="3497259828">
                                <label>CPF</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" name="senha" placeholder="Senha">
                                <label for="floatingPassword">Senha</label>
                            </div>
                            <hr class="my-4">
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>
                            
                        </from>
                    </div>    
                </div>
            </div>
            </div>
        </div>
    </div>    
  
</body>
</html>