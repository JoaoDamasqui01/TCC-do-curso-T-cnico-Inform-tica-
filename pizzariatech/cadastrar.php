<?php
    include_once("includes\conexao.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="estilo\cadastrarAdm.css">
    <title>Cadastro Padrão</title>
</head>
<body>

    <?php
        include_once("includes\menu.php");
    ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center funci" >
                    <h3 class="tam text-center" style="padding-bottom: 20px;">Lista de Funcionalidades</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 arrumar d-flex">
                <a href="Marcas.php">
                    <i class="bi bi-check-circle-fill"></i><br>
                    <span>Marcas</span>
                </a>
            </div>
            <div class="col-md-4 arrumar">
                <a href="Entregas.php">
                    <i class="bi bi-car-front-fill"></i><br>
                    <span>Entregas</span>
                </a>
            </div>
            <div class="col-md-4 arrumar">
                <a href="Fornecedores.php">
                    <i class="bi bi-truck"></i><br>
                    <span>Fornecedores</span>
                </a>

            </div>
        </div><br><br><br>
        <div class="row d-flex justify-content-center">
                <div class="col-md-4 arrumar">
                    <a href="iten.php">
                        <i class="bi bi-blockquote-right"></i><br>
                        <span>Itens</span>
                    </a>
                </div>
                <div class="col-md-4 arrumar">
                    <a href="Pedidos.php">
                        <i class="bi bi-bag-check-fill"></i><br>
                        <span>Finalizar Pedidos</span>
                    </a>
                </div>
        </div>
    </div>
</body>
</html>