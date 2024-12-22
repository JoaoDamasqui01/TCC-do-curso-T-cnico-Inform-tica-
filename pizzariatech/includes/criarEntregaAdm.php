<?php
    include_once("conexao.php");
 
    $veiculo= mysqli_real_escape_string($conn, $_POST['veiculo']);
    $modelo= mysqli_real_escape_string($conn, $_POST['modelo']);
    $placa= mysqli_real_escape_string($conn, $_POST['placa']);

    $sql = "SELECT veiculo, modelo, placa FROM entregas";
    $result  = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO entregas (veiculo, modelo, placa) 
                VALUE ('$veiculo', '$modelo', '$placa')";
        
        if(mysqli_query($conn, $sql)){
            $idEntregas = mysqli_insert_id($conn);
            header("Location: ../EntregasAdm.php?tipo=sucesso&mensagem=Entregas cadastrada com sucesso&idEntregas=$idEntregas");
        } else {
            header("Location: ../EntregasAdm.php?tipo=erro&mensagem=Erro ao cadastrar entrega");
        }

    }else{
        $sql = "INSERT INTO entregas (veiculo, modelo, placa) VALUES ('$veiculo', '$modelo', '$placa')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../EntregasAdm.php?tipo=sucesso&mensagem=Entrega cadastrada com sucesso");
        } else {
            header("Location: ../EntregasAdm.php?tipo=erro&mensagem=Erro ao cadastrar o entrega");
        }
    }

    echo mysqli_error($conn);

?>

