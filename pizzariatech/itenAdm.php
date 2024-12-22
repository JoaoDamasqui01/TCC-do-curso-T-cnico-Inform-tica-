<?php
    include_once("includes/conexao.php");
    session_start();

    if (isset($_GET["idItens"])) {
        $sql = "SELECT * FROM itens WHERE idItens = '{$_GET['idItens']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idItens = $dados['idItens'];
        $idTiposItens  = $dados['idTiposItens'];
        $idFornecedores = $dados['idFornecedores'];
        $idMarcas   = $dados['idMarcas'];
        $nomeItem = $dados['nomeItem'];
         // Corrigido o nome do campo
    } else {
        $idItens = 0;
        $idTiposItens  = "";
        $idFornecedores = "";
        $idMarcas   = "";
        $nomeItem = "";
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
    <title>Iten</title>
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
                    <form action="includes\criarItenAdm.php" method="post">
                        <div class="row">    
                                <input name="idItens" type="hidden" value="<?php echo $idItens;?>"> 
                                <label for="" class="form-label">Nome:</label>
                                <input type="text" name="nomeItem"  class="form-control" value="<?php echo $nomeItem;?>" id="" placeholder="Nome">
                        </div>
                        <div class="row">

                            <label for="tipoItem" class="form-label">Tipo de Item</label>
                            <select name="idTiposItens" id="tipoItem" class="form-control">
                                <?php
                                        $sql = "SELECT * FROM tipositens";
                                        $result = mysqli_query($conn, $sql);
                                        while($dados = mysqli_fetch_assoc($result)){
                                            echo "<option value='".$dados['idTiposItens']."'>".$dados['descricao']."</option>";
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="row">
                            <label for="tipoItem" class="form-label">Marca</label>
                            <select name="idMarcas" id="tipoItem" class="form-control">
                                <?php
                                        $sql = "SELECT * FROM marcas";
                                        $result = mysqli_query($conn, $sql);
                                        while($dados = mysqli_fetch_assoc($result)){
                                            echo "<option value='".$dados['idMarcas']."'>".$dados['marcasProdutos']."</option>";
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="row">

                            <label class="form-label">Fornecedor</label>
                            <select name="idFornecedores"  class="form-control">
                                <?php
                                        $sql = "SELECT * FROM fornecedores";
                                        $result = mysqli_query($conn, $sql);
                                        while($dados = mysqli_fetch_assoc($result)){
                                            echo "<option value='".$dados['idFornecedores']."'>".$dados['nomeFornecedor']."</option>";
                                        }
                                        ?>
                            </select>
                        </div>
                        <hr>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br><br><br><br>

        <div class="row d-flex justify-content-center">
            <h2 class="text-center" style="padding:10px; color:white;">Listagem de Fornecedores</h2>
            <div class="col-md-6 ">
                <table  class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Tipo Itens</th>
                            <th>Marca</th>
                            <th>Fornecedor</th>
                            <th>Acão</th>
                        </tr>
                    </thead>
                    <?php
                        
                        $sql = "SELECT * FROM itens
                                INNER JOIN tipositens ON tipositens.idTiposItens = itens.idTiposItens 
                                INNER JOIN marcas ON marcas.idMarcas = itens.idMarcas
                                INNER JOIN fornecedores ON fornecedores.idFornecedores = itens.idFornecedores";
                        $result = mysqli_query($conn, $sql);
                        while($dados = mysqli_fetch_assoc($result)){
                                if($_SESSION['tipoUserUsuarioLogado'] == 2){
                                    $acoes = "<a class='btn btn-warning' href='itenAdm.php?idItens=".$dados['idItens']."'>Editar</a>
                                        <a href='includes/excluirItens.php?idItens=".$dados['idItens']."' class='btn btn-danger model' data-toggle='modal' data-target='#excluir_".$dados['idItens']."'>Excluir</a>";
                                } else {
                                    $acoes = "";
                                }

                            
                            echo "
                                    <tbody>
                                        <tr>
                                            <td class='table-light'>".$dados['nomeItem']."</td>
                                            <td class='table-light'>".$dados['descricao']."</td>
                                            <td class='table-light'>".$dados['marcasProdutos']."</td>
                                            <td class='table-light'>".$dados['nomeFornecedor']."</td>
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
