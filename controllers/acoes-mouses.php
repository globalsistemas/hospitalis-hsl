
<?php 
    session_start();
    require_once("../DAO/conexao.php");

    //CRIAR MOUSE
    if (isset($_POST['criar_mouse'])) {
        $descricaomou = mysqli_real_escape_string($conexao, trim($_POST['descricaomou']));
        $conexaomou = mysqli_real_escape_string($conexao, trim($_POST['conexaomou']));
        $seriemou = mysqli_real_escape_string($conexao, trim($_POST['seriemou']));
        $observacaomou = mysqli_real_escape_string($conexao, trim($_POST['observacaomou']));     
        $datcadastromou = mysqli_real_escape_string($conexao, trim($_POST['datcadastromou']));

        $sql = "INSERT INTO mouses (descricaomou, conexaomou, seriemou, observacaomou, datcadastromou) VALUES ('$descricaomou', '$conexaomou', 
        '$seriemou', '$observacaomou', '$datcadastromou')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'MOUSE CADASTRADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/mouses');
            exit;
        } else {
            $_SESSION['mensagem'] = 'MOUSE NÃO CADASTRADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/mouses');
            exit;
        }
    }

    //EDITAR MOUSE
    if (isset($_POST['editar_mouse'])) {
        $idmou = mysqli_real_escape_string($conexao, $_POST['idmou']);

        $descricaomou = mysqli_real_escape_string($conexao, trim($_POST['descricaomou']));
        $conexaomou = mysqli_real_escape_string($conexao, trim($_POST['conexaomou']));
        $seriemou = mysqli_real_escape_string($conexao, trim($_POST['seriemou']));
        $observacaomou = mysqli_real_escape_string($conexao, trim($_POST['observacaomou']));     
        $datcadastromou = mysqli_real_escape_string($conexao, trim($_POST['datcadastromou']));

        $sql = "UPDATE mouses SET descricaomou = '$descricaomou', conexaomou = '$conexaomou', seriemou = '$seriemou', 
        observacaomou = '$observacaomou', datcadastromou = '$datcadastromou' WHERE idmou = $idmou";
         
        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'MOUSE EDITADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/mouses');
            exit;
        } else {
            $_SESSION['mensagem'] = 'MOUSE NÃO EDITADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/mouses');
            exit;
        }
    }

    //EXCLUIR MOUSE
    if (isset($_POST['deletar_mouse'])) {
        $idmou = mysqli_real_escape_string($conexao, $_POST['deletar_mouse']);
        
        $sql = "DELETE FROM mouses WHERE idmou = $idmou";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = "MOUSE DELETADO COM SUCESSO!";
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/mouses');
            exit;
        } else {
            $_SESSION['mensagem'] = "MOUSE NÃO DELETADO.";
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/mouses');
            exit;

        }
    }
?>