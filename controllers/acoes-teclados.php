<?php 
    session_start();
    require_once("../DAO/conexao.php");

    //CRIAR TECLADO
    if (isset($_POST['criar_teclado'])) {
        $descricaotec = mysqli_real_escape_string($conexao, trim($_POST['descricaotec']));
        $conexaotec = mysqli_real_escape_string($conexao, trim($_POST['conexaotec']));
        $serietec = mysqli_real_escape_string($conexao, trim($_POST['serietec']));
        $observacaotec = mysqli_real_escape_string($conexao, trim($_POST['observacaotec']));     
        $datcadastrotec = mysqli_real_escape_string($conexao, trim($_POST['datcadastrotec']));

        $sql = "INSERT INTO teclados (descricaotec, conexaotec, serietec, observacaotec, datcadastrotec) VALUES ('$descricaotec', '$conexaotec', '$serietec', 
        '$observacaotec', '$datcadastrotec')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'TECLADO CADASTRADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/teclados');
            exit;
        } else {
            $_SESSION['mensagem'] = 'TECLADO NÃO CADASTRADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/teclados');
            exit;
        }
    }

    //EDITAR TECLADO
    if (isset($_POST['editar_teclado'])) {
        $idtec = mysqli_real_escape_string($conexao, $_POST['idtec']);

        $descricaotec = mysqli_real_escape_string($conexao, trim($_POST['descricaotec']));
        $conexaotec = mysqli_real_escape_string($conexao, trim($_POST['conexaotec']));
        $serietec = mysqli_real_escape_string($conexao, trim($_POST['serietec']));
        $observacaotec = mysqli_real_escape_string($conexao, trim($_POST['observacaotec']));     
        $datcadastrotec = mysqli_real_escape_string($conexao, trim($_POST['datcadastrotec']));

        $sql = "UPDATE teclados SET descricaotec = '$descricaotec', conexaotec = '$conexaotec', serietec = '$serietec', 
        observacaotec = '$observacaotec', datcadastrotec = '$datcadastrotec' WHERE idtec = $idtec";
         
        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'TECLADO EDITADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/teclados');
            exit;
        } else {
            $_SESSION['mensagem'] = 'TECLADO NÃO EDITADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/teclados');
            exit;
        }
    }

?>