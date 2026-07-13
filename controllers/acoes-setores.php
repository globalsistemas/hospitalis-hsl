

<?php 
    session_start();
    require_once("../DAO/conexao.php");

    //CRIAR SETOR
    if (isset($_POST['criar_setor'])) {
        $descricaoset = mysqli_real_escape_string($conexao, trim($_POST['descricaoset']));
        $datcadastroset = mysqli_real_escape_string($conexao, trim($_POST['datcadastro']));
        $observacaoset = mysqli_real_escape_string($conexao, trim($_POST['observacaoset']));     

        $sql = "INSERT INTO setores (descricaoset, datcadastro, observacaoset) VALUES ('$descricaoset', '$datcadastroset', '$observacaoset')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'SETOR CADASTRADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/setores');
            exit;
        } else {
            $_SESSION['mensagem'] = 'SETOR NÃO CADASTRADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/setores');
            exit;
        }
    }

    //EDITAR SETOR
    if (isset($_POST['editar_setor'])) {
        $idset = mysqli_real_escape_string($conexao, $_POST['idset']);

        $descricaoset = mysqli_real_escape_string($conexao, trim($_POST['descricaoset']));
        $datcadastroset = mysqli_real_escape_string($conexao, trim($_POST['datcadastro']));
        $observacaoset = mysqli_real_escape_string($conexao, trim($_POST['observacaoset']));     

        $sql = "UPDATE setores SET descricaoset = '$descricaoset', datcadastro = '$datcadastroset', observacaoset = '$observacaoset' WHERE idset = $idset";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'SETOR EDITADO COM SUCESSO!';     
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/setores');
            exit;
        } else {
            $_SESSION['mensagem'] = 'SETOR NÃO EDITADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/setores');
            exit;
        }
    }
?>