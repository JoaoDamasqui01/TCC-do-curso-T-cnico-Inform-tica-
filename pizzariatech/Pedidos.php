<?php
    include_once("includes/conexao.php");
    session_start();

    // Verifica conexão com o banco
    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Verifica se $idPedidos foi enviado pelo formulário e define o valor
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pedidos</title>
</head>

<style>
    *{
       overflow-x:hidden; 
    }
</style>

<body style="background: rgba(204, 56, 56, 1);">

<?php include_once("includes/menu.php"); ?>

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
        <!-- Primeiro formulário -->
           <div class="row justify-content-center mt-4">
                <div class="col-md-6 card p-4 ">
                    <form action="includes/criarPedido.php" method="post">
                        <input type="hidden" name="idPedidos" value="0" id="">
                        <label for="formaPagamento" class="form-label">Forma de Pagamento</label>
                        <select name="idFormasPagamentos" id="formaPagamento" class="form-control">
                            <?php
                            $sql = "SELECT * FROM formaspagamento";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . htmlspecialchars($row['idFormasPagamentos']) . "'>" . htmlspecialchars($row['pagamentos']) . "</option>";
                                }
                            }
                            ?>
                        </select>

                        <label for="usuario" class="form-label">Usuário</label>
                        <select name="idUsuarios" id="usuario" class="form-control">
                            <?php
                            $sql = "SELECT * FROM usuarios";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . htmlspecialchars($row['idUsuario']) . "'>" . htmlspecialchars($row['nomeCompleto']) . "</option>";
                                }
                            }
                            ?>
                        </select>

                        <label for="dataPedido" class="form-label">Data de Pedido</label>
                        <input type="date" id="dataPedido" class="form-control" value="<?php echo $dataPedido?>" name="dataPedido">

                        <label for="localizacao" class="form-label">Localização</label>
                        <input type="text" id="localizacao" class="form-control" name="localizacao">

                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">Avançar</button>
                        </div>
                    </form>
                </div>
            </div>
    
        <!-- Segundo formulário -->


    <br><br><br><br><br>

    <div class="row d-flex justify-content-center">
            <h2 class="text-center" style="padding:10px; color:white;">Listagem do Pedido Final</h2>
    </div>
    <div class="row d-flex justify-content-center">
    
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Item</th>
                            <th>Localização</th>
                            <th>Veiculo</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>Quantidade</th>
                            <th>Preco Unitario </th>
                            <th>Preco Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM pedidositens
                                INNER JOIN entregas ON pedidositens.idEntregas = entregas.idEntregas
                                INNER JOIN itens ON pedidositens.idItens = itens.idItens
                                INNER JOIN pedidos ON pedidositens.idPedidos = pedidos.idPedidos"; // Incluindo idMarcas para edição e exclusão
                        $result = mysqli_query($conn, $sql);
                        while($dados = mysqli_fetch_assoc($result)){
                            echo "
                                <tr>
                                    <td class='table-light'>".$dados['nomeItem']."</td>
                                    <td class='table-light'>".$dados['localizacao']."</td>
                                    <td class='table-light'>".$dados['veiculo']."</td>
                                    <td class='table-light'>".$dados['modelo']."</td>
                                    <td class='table-light'>".$dados['placa']."</td>
                                    <td class='table-light'>".$dados['qtde']."</td>
                                    <td class='table-light'>".$dados['precoUnitario']."</td>
                                    <td class='table-light'>".$dados['precoTotal']."</td>
                                    
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
