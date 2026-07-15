
<?php 
    session_start();
    require_once("../DAO/conexao.php");

    //CRIAR MONITORES
    if (isset($_POST['criar_monitores'])) {
        $descricaomon = mysqli_real_escape_string($conexao, trim($_POST['descricaomon']));
        $polegadasmon = mysqli_real_escape_string($conexao, trim($_POST['polegadasmon']));
        $seriemon = mysqli_real_escape_string($conexao, trim($_POST['seriemon']));
        $datcadastromon = mysqli_real_escape_string($conexao, trim($_POST['datcadastromon']));
        $observacaomon = mysqli_real_escape_string($conexao, trim($_POST['observacaomon']));     

        $sql = "INSERT INTO monitores (descricaomon, polegadasmon, seriemon, datcadastromon, observacaomon) 
        VALUES ('$descricaomon', '$polegadasmon', '$seriemon', '$datcadastromon', '$observacaomon')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'MONITOR CADASTRADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/monitores');
            exit;
        } else {
            $_SESSION['mensagem'] = 'MONITOR NÃO CADASTRADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/monitores');
            exit;
        }
    }

    //EDITAR MONITOR
    if (isset($_POST['editar_monitores'])) {
        $idmon = mysqli_real_escape_string($conexao, $_POST['idmon']);

        $descricaomon = mysqli_real_escape_string($conexao, trim($_POST['descricaomon']));
        $polegadasmon = mysqli_real_escape_string($conexao, trim($_POST['polegadasmon']));
        $seriemon = mysqli_real_escape_string($conexao, trim($_POST['seriemon']));
        $datcadastromon = mysqli_real_escape_string($conexao, trim($_POST['datcadastromon']));
        $observacaomon = mysqli_real_escape_string($conexao, trim($_POST['observacaomon']));

        $sql = "UPDATE monitores SET descricaomon = '$descricaomon', polegadasmon = '$polegadasmon', seriemon = '$seriemon', 
        datcadastromon = '$datcadastromon', observacaomon = '$observacaomon' WHERE idmon = $idmon";

        mysqli_query($conexao, $sql);
        
        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'MONITOR EDITADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/monitores');
            exit;
        } else {
            $_SESSION['mensagem'] = 'MONITOR NÃO EDITADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/monitores');
            exit;
        }
    }

    //EXCLUIR MONITOR
    if (isset($_POST['deletar_monitor'])) {
        $idmon = mysqli_real_escape_string($conexao, $_POST['deletar_monitor']);
        
        $sql = "DELETE FROM monitores WHERE idmon = $idmon";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = "MONITOR DELETADO COM SUCESSO!";
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/monitores');
            exit;
        } else {
            $_SESSION['mensagem'] = "MONITOR NÃO DELETADO.";
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/monitores');
            exit;

        }
    }
?>