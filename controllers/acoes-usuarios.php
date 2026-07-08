
<?php 
    session_start();
    require_once("../DAO/conexao.php");

    if (isset($_POST['criar_usuario'])) {
        $nomeusu = mysqli_real_escape_string($conexao, trim($_POST['login']));
        $senhausu = mysqli_real_escape_string($conexao, trim($_POST['senha']));
        $idcol = mysqli_real_escape_string($conexao, trim($_POST['idcol']));
        $datcadastrocol = mysqli_real_escape_string($conexao, trim($_POST['data_cadastro']));

        $sql = "INSERT INTO usuarios (nomeusu, senhausu, idcol, datcadastrousu) VALUES ('$nomeusu', '$senhausu', '$idcol', '$datcadastrocol')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'USUÁRIO CADASTRADO COM SUCESSO!';     
            header('Location: ../pages/usuarios');
            exit;
        } else {
            $_SESSION['mensagem'] = 'USUÁRIO NÃO CADASTRADO.';
            header('Location: ../pages/usuarios');
            exit;
        }
    }
?>