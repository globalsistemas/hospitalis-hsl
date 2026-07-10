
<?php 
    session_start();
    require_once("../DAO/conexao.php");


    if (isset($_POST['logar-usuario'])) {
        $nomeusu = mysqli_real_escape_string($conexao, trim($_POST['login']));
        $senhausu = mysqli_real_escape_string($conexao, trim($_POST['senha']));

        $sql = "SELECT usu.*, col.idcol, col.nomecol, col.cpfcol, col.emailcol FROM usuarios AS usu  INNER JOIN colaboradores AS col ON usu.idcol=col.idcol WHERE 
        nomeusu = '$nomeusu' AND senhausu = '$senhausu'";

        $query = mysqli_query($conexao, $sql);

        $usuario = mysqli_fetch_assoc($query);

        if (mysqli_num_rows($query) > 0) {
            $_SESSION['nomecol'] = $usuario['nomecol'];
            header('Location: ../public');
            exit;
        } else {
            $_SESSION['mensagem'] = "USUÁRIO E SENHA INVÁLIDOS.";
            $_SESSION['tipoalert'] = "alert-danger";
            header('Location: ../pages/login');
            exit;
        }
    } 
?>
