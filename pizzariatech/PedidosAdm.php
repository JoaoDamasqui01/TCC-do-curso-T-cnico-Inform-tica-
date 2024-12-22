<?php
    include_once("includes/conexao.php");
    session_start();

    // Verifica se $idPedidos foi enviado pelo formulário e define o valor
    if (isset($_GET["idPedidos"])) {
        $sql = "SELECT * FROM pedidositens WHERE idPedidos = '{$_GET['idPedidos']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idPedidos = $dados['idPedidos'];
        $idFormasPagamentos = $dados['idFormasPagamentos'];
        $idUsuarios  = $dados['idUsuarios '];
        $idEntregas = $dados['idEntregas'];
        $localizacao = $dados['localizacao'];
        $dataPedido = $dados['dataPedido']; // Corrigido o nome do campo
    } else {
        $idPedidos = 0;
        $idFormasPagamentos = 0;
        $idUsuarios  = 0;
        $idEntregas = 0;
        $localizacao = "";
        $dataPedido = "";
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

<?php
    include_once("includes\menuAdm.php")
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

            <div class="row justify-content-center">
                <div class="col-md-6 card p-4">
                    <form action="includes/criarPedidoAdm.php" method="post">
                        <input type="" name="idPedidos" value="0" id="">
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
                                    echo "<option value='" . htmlspecialchars($row['idUsuarios']) . "'>" . htmlspecialchars($row['nomeCompleto']) . "</option>";
                                }
                            }
                            ?>
                        </select>

                        <label for="dataPedido" class="form-label">Data de Pedido</label>
                        <input type="date" id="dataPedido" class="form-control" name="dataPedido">

                        <label for="localizacao" class="form-label">Localização</label>
                        <input type="text" id="localizacao" class="form-control" name="localizacao">

                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">Avançar</button>
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
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM pedidositens
                                INNER JOIN entregas ON pedidositens.idEntregas = entregas.idEntregas
                                INNER JOIN itens ON pedidositens.idItens = itens.idItens
                                INNER JOIN pedidos ON pedidositens.idPedidos = pedidos.idPedidos"; // Incluindo idPedidosItens para edição e exclusão
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
                                    <td class='table-light' style='text-align: center;'>
                                        <a class='btn btn-warning' href='PedidosAdm.php?idPedidosItens=".$dados['idPedidosItens']."'>Editar</a>
                                        <a href='includes/excluirPedidosItens.php?idPedidosItens=".$dados['idPedidosItens']."' class='btn btn-danger model' data-toggle='modal' data-target='#excluir_".$dados['idPedidosItens']."'>Excluir</a>
                                    </td>
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
