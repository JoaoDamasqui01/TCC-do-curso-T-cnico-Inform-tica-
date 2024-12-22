<?php
    include_once('includes/conexao.php');

    session_start();

    if (isset($_GET["idMarcas"])) {
        $sql = "SELECT * FROM marcas WHERE idMarcas = '{$_GET['idMarcas']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idMarcas = $dados['idMarcas'];
        $marcasProdutos = $dados['marcasProdutos']; // Corrigido o nome do campo
    } else {
        $idMarcas = 0;
        $marcasProdutos = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="estilo/marcas.css">
    <title>Marcas</title>
</head>

<style>
    *{
       overflow-x:hidden; 
    }
</style>

<body style="background: rgba(204, 56, 56, 1);">

    <?php include_once("includes\menu.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
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
            </div>
            <div class="quadradoPai">
                <form action="includes/criarMarca.php" class="card" method="post">
                    <input type="hidden" name="idMarcas" value="<?php echo $idMarcas;?>"> <!-- Campo oculto para idMarcas -->
                    <label for="" class="form-label">Marca do Produto:</label>
                    <input type="text" class="form-control" value="<?php echo $marcasProdutos;?>" name="marcasProdutos" placeholder="Haizen">
                    <button class="btn btn-primary enviar" type="submit">Enviar</button>
                </form>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <h2 class="text-center" style="padding:10px; color:white;">Listagem de Marcas</h2>
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                           $sql = "SELECT * FROM Marcas"; // Incluindo idMarcas para edição e exclusão
                           $result = mysqli_query($conn, $sql);
                           while($dados = mysqli_fetch_assoc($result)){
                               echo "
                                   <tr>
                                       <td class='table-light'>".$dados['marcasProdutos']."</td>
                                   </tr>";
   
                           }
                       ?>
                
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

</body>
</html>
