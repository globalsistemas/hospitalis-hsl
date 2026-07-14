
<?php 
    session_start();
    require_once("../DAO/conexao.php");

    //CRIAR USUÁRIO
    if (isset($_POST['criar_usuario'])) {
        $nomeusu = mysqli_real_escape_string($conexao, trim($_POST['login']));
        $senhausu = mysqli_real_escape_string($conexao, trim($_POST['senha']));
        $idcol = mysqli_real_escape_string($conexao, trim($_POST['idcol']));
        $datcadastrocol = mysqli_real_escape_string($conexao, trim($_POST['data_cadastro']));

        $sql = "INSERT INTO usuarios (nomeusu, senhausu, idcol, datcadastrousu) VALUES ('$nomeusu', '$senhausu', '$idcol', '$datcadastrocol')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'USUÁRIO CADASTRADO COM SUCESSO!'; 
            $_SESSION['tipoalert'] = "alert-success";    
            header('Location: ../pages/usuarios');
            exit;
        } else {
            $_SESSION['mensagem'] = 'USUÁRIO NÃO CADASTRADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/usuarios');
            exit;
        }
    }

    //EDITAR USUÁRIO
    if (isset($_POST['editar_usuario'])) {
        $idusu = mysqli_real_escape_string($conexao, $_POST['idusu']);

        $nomeusu = mysqli_real_escape_string($conexao, trim($_POST['login']));
        $senhausu = mysqli_real_escape_string($conexao, trim($_POST['senha']));
        $idcol = mysqli_real_escape_string($conexao, trim($_POST['idcol']));
        $datcadastrocol = mysqli_real_escape_string($conexao, trim($_POST['data_cadastro']));

        $sql = "UPDATE usuarios SET nomeusu = '$nomeusu', senhausu = '$senhausu', idcol = '$idcol', datcadastrousu = '$datcadastrocol' WHERE idusu = $idusu";
        
        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'USUÁRIO EDITADO COM SUCESSO!';
            $_SESSION['tipoalert'] = "alert-success";     
            header('Location: ../pages/usuarios');
            exit;
        } else {
            $_SESSION['mensagem'] = 'USUÁRIO NÃO EDITADO.';
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/usuarios');
            exit;
        }
    }

    if (isset($_POST['deletar_usuario'])) {
        $idusu = mysqli_real_escape_string($conexao, $_POST['deletar_usuario']);
        
        $sql = "DELETE FROM usuarios WHERE idusu = $idusu";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = "USUÁRIO DELETADO COM SUCESSO!";
            $_SESSION['tipoalert'] = "alert-success";
            header('Location: ../pages/usuarios');
            exit;
        } else {
            $_SESSION['mensagem'] = "USUÁRIO NÃO DELETADO.";
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/usuarios');
            exit;

        }
    }
?>