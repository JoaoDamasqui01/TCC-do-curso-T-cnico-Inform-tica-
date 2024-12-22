<?php
    include_once("includes\conexao.php");

    if (isset($_GET["idUsuario"])) {
        $sql = "SELECT * FROM usuarios WHERE idUsuario = '{$_GET['idUsuario']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idUsuario = $dados['idUsuario'];
        $idTipoUser = $dados['idTipoUser'];
        $nomeCompleto = $dados['nomeCompleto'];
        $senha = $dados['senha'];
        $cpf = $dados['cpf']; // Corrigido o nome do campo
    } else {
        $idUsuario = 0;
        $idTipoUser = 0;
        $nomeCompleto = "";
        $senha = "";
        $cpf = "";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="estilo\usuariosAdm.css">
    <title>Listagem de Usuários</title>
</head>
<body style="background: rgba(204, 56, 56, 1);">

    <?php include_once("includes\menuAdm.php")?>

   
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
        <div class="row d-flex justify-content-center mt-4">
            
                <div class="col-md-6 card p-4">
                    <form action="includes\criarUserPeloAdm.php" method="post">
                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario;?>">
                        <label for="" class="form-label">Nome do Usuario:</label>
                        <input type="text" name="nomeCompleto" value="<?php echo $nomeCompleto?>" class="form-control" id="" placeholder="Joãozinho Pão Bento"><br>
                        
                        <label for="" class="form-label">Senha:</label>
                        <input type="text" name="senha" id="" value="<?php echo $senha?>"class="form-control" placeholder="Onix"><br>
                        
                        <label for="" class="form-label">CPF:</label>
                        <input type="text" name="cpf" class="form-control" value="<?php echo $cpf?>" placeholder=""><br>

                        <label for="" class="from-label">Tipo de acesso</label>
                        <select name="idTipoUser" class ="form-control" id="">
                            <?php
                                $sql = "SELECT * FROM tipouser";
                                $result = mysqli_query($conn, $sql);
                                while($dados = mysqli_fetch_assoc($result)){
                                      echo"
                                          <option value=".$dados['idTipoUser'].">".$dados['tipo']."</option>
                                      
                                      ";  
                                }
                            ?>
                        </select>
                        <hr>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning">Cadastrar</button>
                        </div>
                    </form>
                </div>
           
        </div>
        <br><br><br><br><br>

        <div class="row d-flex justify-content-center">
            <h2 class="text-center" style="padding:10px; color:white;">Listagem de Usuário</h2>
            <div class="col-md-6 ">
                <table  class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuarios</th>
                            <th>Tipo Acesso</th>
                            <th>Senha</th>
                            <th>CPF</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <?php
                        if (!isset($_GET['nomeCompleto'])) {
							$sql = "SELECT idUsuario, tipo, nomeCompleto, senha, cpf FROM usuarios
                                INNER JOIN tipouser ON usuarios.idTipoUser = tipouser.idTipoUser";
						} 
                        
                        $result = mysqli_query($conn, $sql);
                        if ($result) {

                            while($dados = mysqli_fetch_assoc($result)){
                                echo "
                                    <tr>
                                        <td class='table-light'>".$dados['nomeCompleto']."</td>
                                        <td class='table-light'>".$dados['tipo']."</td>
                                        <td class='table-light'>".$dados['senha']."</td>
                                        <td class='table-light'>".$dados['cpf']."</td>
                                        <td class='table-light' style='text-align: center;'>
                                            <a class='btn btn-warning' href='usuariosAdm.php?idUsuario=".$dados['idUsuario']."'>Editar</a>
                                            <a href='includes/excluirUsuario.php?idUsuario=".$dados['idUsuario']."' class='btn btn-danger'>Excluir</a>
                                        </td>    
                                    </tr>
                                </div>";
                            }
                        } 

                        
                    ?>
                </table>
            </div>
        </div>
    </div>
        
    
</body>
</html>