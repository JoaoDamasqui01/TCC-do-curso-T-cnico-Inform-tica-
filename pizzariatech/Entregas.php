<?php
    include_once("includes\conexao.php");
    session_start();

    if (isset($_GET["idEntregas"])) {
        $sql = "SELECT * FROM entregas WHERE idEntregas = '{$_GET['idEntregas']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idEntregas = $dados['idEntregas'];
        $veiculo = $dados['veiculo'];
        $modelo = $dados['modelo'];
        $placa = $dados['placa']; // Corrigido o nome do campo
    } else {
        $idEntregas = 0;
        $veiculo = "";
        $modelo = "";
        $placa = "";
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="estilo\entrega.css">
    <title>Entregas</title>
</head>

<style>
    *{
       overflow-x:hidden; 
    }
</style>

<body style=" background: rgba(204, 56, 56, 1);">
    
    <?php
        include_once("includes\menu.php");
    ?>

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
        </div>
        <div class="row d-flex justify-content-center align-items-start mt-4">
            <div class="quadradoPai">
                <div class="col-md-4 card p-4">
                    <form action="includes\criarEntrega.php" method="post">
                        <input type="hidden" name="idEntregas" value="<?php echo $idEntregas;?>">
                
                        <label for="" class="form-label">Veiculo:</label>
                        <input type="text" name="veiculo" value="<?php echo $veiculo?>" class="form-control" id="" placeholder="Carro, Barco, Moto"><br>
                        
                        <label for="" class="form-label">Modelo:</label>
                        <input type="text" name="modelo" id="" value="<?php echo $modelo?>"class="form-control" placeholder="Onix"><br>
                        
                        <label for="" class="form-label">Placa:</label>
                        <input type="text" name="placa" class="form-control" value="<?php echo $placa?>" maxlength="7" placeholder="52f934"><br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br><br><br><br><br>
        <div class="row d-flex justify-content-center" style="overflow-y:hidden;">
            <h2 class="text-center" style="padding:10px; color:white;">Listagem de Entregas</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <table  class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>veiculo</th>
                            <th>modelo</th>
                            <th>placa</th>
                           
                        </tr>
                    </thead>
                    <?php
                        
                        $sql = "SELECT idEntregas, veiculo, modelo, placa FROM entregas";
                        $result = mysqli_query($conn, $sql);
                        while($dados = mysqli_fetch_assoc($result)){
                            echo "
                                    <tbody>
                                        <tr>
                                            <td class='table-light'>".$dados['veiculo']."</td>
                                            <td class='table-light'>".$dados['modelo']."</td>
                                            <td class='table-light'>".$dados['placa']."</td>
                                            
                                        </tr>
                                    </tbody>";
                        }
                        
                    ?>
                </table>
            </div>
        </div>
    </div>

    
</body>
</html>
