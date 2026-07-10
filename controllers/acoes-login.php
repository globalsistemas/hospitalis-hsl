
<?php 
    session_start();
    require_once("../DAO/conexao.php");


    if (isset($_POST['logar-usuario'])) {
        $nomeusu = mysqli_real_escape_string($conexao, trim($_POST['login']));
        $senhausu = mysqli_real_escape_string($conexao, trim($_POST['senha']));

        $sql = "SELECT * FROM usuarios WHERE nomeusu = '$nomeusu' AND senhausu = '$senhausu'";

        $query = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($query) > 0) {
            header('Location: ../public');
            exit;
        } else {
            $_SESSION['mensagem'] = "USUÁRIO NÃO CADASTRADO.";
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/login');
            exit;
        }
    } 
?>
