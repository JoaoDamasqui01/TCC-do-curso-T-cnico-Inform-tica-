<?php
    include_once("includes\conexao.php");
    session_start();

    if (isset($_GET["idFornecedores"])) {
        $sql = "SELECT * FROM fornecedores WHERE idFornecedores = '{$_GET['idFornecedores']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idFornecedores = $dados['idFornecedores'];
        $nomeFornecedor = $dados['nomeFornecedor'];
        $endereco = $dados['endereco'];
        $cnpj = $dados['cnpj'];
        $fone = $dados['fone'];
         // Corrigido o nome do campo
    } else {
        $idFornecedores = 0;
        $nomeFornecedor = "";
        $endereco = "";
        $cnpj = "";
        $fone = "";
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
    <link rel="stylesheet" href="estilo\fornecedores.css">
    <title>Fornecedores</title>
</head>

<style>
    *{
       overflow-x:hidden; 
    }
</style>

<body style="background: rgba(204, 56, 56, 1);">
    
    <?php
        include_once("includes\menuAdm.php");
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
                <div class="col-md-4 card p-4 formulario">
                    <form action="includes\criarForncedoresAdm.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="idFornecedores" value="<?php echo $idFornecedores;?>"> 
                                <label for="" class="form-label">Fornecedor:</label>
                                <input type="text" name="nomeFornecedor"  class="form-control" value="<?php echo $nomeFornecedor;?>" id="" placeholder="Nome">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">CNPJ:</label>
                                <input type="text" name="cnpj" class="form-control" value="<?php echo $cnpj?>"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Endereço:</label>
                                <input type="text" name="endereco" id="" class="form-control"
                                value="<?php echo $endereco?>" placeholder=""><br>
                            </div>
                            <div class="col-md-6">

                                <label for="" class="form-label">Telefone:</label>
                                <input type="text" name="fone" class="form-control" value="<?php echo $fone?>" maxlength="7" placeholder="52f934"><br>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

        <div class="row d-flex justify-content-center">
            <h2 class="text-center" style="padding:10px; color:white;">Listagem de Fornecedores</h2>
            <div class="col-md-6 ">
                <table  class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Forncedores</th>
                            <th>Endereço</th>
                            <th>CNPJ</th>
                            <th>Telefone</th>
                            <th>Acão</th>
                        </tr>
                    </thead>
                    <?php
                        
                        $sql = "SELECT * FROM fornecedores";
                        $result = mysqli_query($conn, $sql);
                        while($dados = mysqli_fetch_assoc($result)){
                            if($_SESSION['tipoUserUsuarioLogado'] == 2){
                                $acoes = " <a class='btn btn-warning' href='FornecedoresAdm.php?idFornecedores=".$dados['idFornecedores']."'>Editar</a>
                                        <a href='includes/excluirFornecedores.php?idFornecedores=".$dados['idFornecedores']."' class='btn btn-danger model' data-toggle='modal' data-target='#excluir_".$dados['idFornecedores']."'>Excluir</a>";
                            } else {
                                $acoes = "";
                            }
                            echo "
                                    <tbody>
                                        <tr>
                                            <td class='table-light'>".$dados['nomeFornecedor']."</td>
                                            <td class='table-light'>".$dados['endereco']."</td>
                                            <td class='table-light'>".$dados['cnpj']."</td>
                                            <td class='table-light'>".$dados['fone']."</td>
                                    <td class='table-light' style='text-align: center;'>
                                       ".$acoes."
                                    </td>
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
