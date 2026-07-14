
<?php 
    session_start();
    require_once("../DAO/conexao.php");

    //CRIAR GABINETES
    if (isset($_POST['criar_gabinetes'])) {
        $marcagab = mysqli_real_escape_string($conexao, trim($_POST['marcagab']));
        $processadorgab = mysqli_real_escape_string($conexao, trim($_POST['processadorgab']));
        $memoriagab = mysqli_real_escape_string($conexao, trim($_POST['memoriagab']));
        $armazenamentogab = mysqli_real_escape_string($conexao, trim($_POST['armazenamentogab']));
        $tamarmazenamentogab = mysqli_real_escape_string($conexao, trim($_POST['tamarmazenamentogab']));
        $datcadastrogab = mysqli_real_escape_string($conexao, trim($_POST['datcadastrogab']));
        $observacaogab = mysqli_real_escape_string($conexao, trim($_POST['observacaogab']));     

        $sql = "INSERT INTO gabinetes (marcagab, processadorgab, memoriagab, armazenamentogab, tamarmazenamentogab, datcadastrogab, observacaogab) 
        VALUES ('$marcagab', '$processadorgab', '$memoriagab', '$armazenamentogab', '$tamarmazenamentogab', '$datcadastrogab', '$observacaogab')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'COMPUTADOR CADASTRADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/gabinetes');
            exit;
        } else {
            $_SESSION['mensagem'] = 'COMPUTADOR NÃO CADASTRADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/gabinetes');
            exit;
        }
    }

    //EDITAR GABINETE
    if (isset($_POST['editar_gabinetes'])) {
        $idgab = mysqli_real_escape_string($conexao, $_POST['idgab']);

        $marcagab = mysqli_real_escape_string($conexao, trim($_POST['marcagab']));
        $processadorgab = mysqli_real_escape_string($conexao, trim($_POST['processadorgab']));
        $memoriagab = mysqli_real_escape_string($conexao, trim($_POST['memoriagab']));
        $armazenamentogab = mysqli_real_escape_string($conexao, trim($_POST['armazenamentogab']));
        $tamarmazenamentogab = mysqli_real_escape_string($conexao, trim($_POST['tamarmazenamentogab']));
        $datcadastrogab = mysqli_real_escape_string($conexao, trim($_POST['datcadastrogab']));
        $observacaogab = mysqli_real_escape_string($conexao, trim($_POST['observacaogab']));

        $sql = "UPDATE gabinetes SET marcagab = '$marcagab', processadorgab = '$processadorgab', memoriagab = '$memoriagab', 
        armazenamentogab = '$armazenamentogab', tamarmazenamentogab = '$tamarmazenamentogab', datcadastrogab = '$datcadastrogab', 
        observacaogab = '$observacaogab' WHERE idgab = $idgab";

        mysqli_query($conexao, $sql);
        
        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'GABINETE EDITADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/gabinetes');
            exit;
        } else {
            $_SESSION['mensagem'] = 'GABINETE NÃO EDITADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/gabinetes');
            exit;
        }
    }

    //EXCLUIR GABINETE
    if (isset($_POST['deletar_gabinete'])) {
        $idgab = mysqli_real_escape_string($conexao, $_POST['deletar_gabinete']);
        
        $sql = "DELETE FROM gabinetes WHERE idgab = $idgab";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = "GABINETE DELETADO COM SUCESSO!";
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/setores');
            exit;
        } else {
            $_SESSION['mensagem'] = "GABINETE NÃO DELETADO.";
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/setores');
            exit;

        }
    }

?>