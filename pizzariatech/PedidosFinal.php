<?php
    include_once("includes/conexao.php");
    session_start();

    // Verifica conexão com o banco
    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    if (isset($_GET["idPedidosItens"])) {
        $sql = "SELECT * FROM pedidositens WHERE idPedidosItens = '{$_GET['idPedidosItens']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idPedidosItens = $dados['idPedidosItens'];
        $idItens = $dados['idItens'];
        $idPedidos = $dados['idPedidos'];
        $idEntregas = $dados['idEntregas'];
        $qtde = $dados['qtde'];
        $precoUnitario = $dados['precoUnitario']; // Corrigido o nome do campo
    } else {
        $idPedidosItens = 0;
        $idItens = 0;
        $idPedidos = 0;
        $idEntregas = 0;
        $qtde = "";
        $precoUnitario = "";
    }
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
        <!-- Segundo formulário -->
         <br><br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-6 card p-4">
            <form action="includes/criarPedidosItens.php" method="post">    
                <input type="heddien" name="idPedidos" value="<?php echo $_GET['idPedido'];?>" >
                <input type="" name="idPedidosItens" value="0" >
                <label for="entrega" class="form-label">Tipo de Entregas</label>
                <select name="idEntregas" id="entrega" class="form-control">
                    <?php
                    $sql = "SELECT * FROM entregas";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . htmlspecialchars($row['idEntregas']) . "'>" . htmlspecialchars($row['veiculo']) . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="item" class="form-label">Item</label>
                <select name="idItens" id="item" class="form-control">
                    <?php
                    $sql = "SELECT * FROM itens";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . htmlspecialchars($row['idItens']) . "'>" . htmlspecialchars($row['nomeItem']) . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="text" id="quantidade" value ="<?php echo $qtde?>"class="form-control" name="qtde">

                <label for="preco" class="form-label">Preço Unitário</label>
                <input type="text" id="preco" class="form-control" value="<?php echo  $precoUnitario?>" name="precoUnitario">

                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    
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
