
<?php 
    session_start();
    require_once("../DAO/conexao.php");
    

    if (isset($_POST['criar_colaborador'])) {
        $nomecol = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $conselhocol = mysqli_real_escape_string($conexao, trim($_POST['conselho']));
        $cpfcol = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
        $datnascimentocol = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
        $datcadastrocol = mysqli_real_escape_string($conexao, trim($_POST['data_cadastro']));
        $emailcol = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $cepcol = mysqli_real_escape_string($conexao, trim($_POST['cep']));
        $enderecocol = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
        $numcol = mysqli_real_escape_string($conexao, trim($_POST['numero']));
        $bairrocol = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
        $cidadecol = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
        $ufcol = mysqli_real_escape_string($conexao, trim($_POST['uf']));
        $complementocol = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
        $observacaocol = mysqli_real_escape_string($conexao, trim($_POST['observacao']));

        $sql = "INSERT INTO colaboradores (nomecol, conselhocol, cpfcol, datnascimentocol, datcadastrocol, emailcol, cepcol, 
        enderecocol, numcol, bairrocol, cidadecol, ufcol, complementocol, observacaocol) VALUES ('$nomecol', '$conselhocol', '$cpfcol', 
        '$datnascimentocol', '$datcadastrocol', '$emailcol', '$cepcol', '$enderecocol', '$numcol', '$bairrocol', '$cidadecol', '$ufcol', 
        '$complementocol', '$observacaocol')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'USUÁRIO CADASTRADO COM SUCESSO!';     
            header('Location: ../pages/colaboradores.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'USUÁRIO NÃO CADASTRADO.';
            header('Location: ../pages/colaboradores.php');
            exit;
        }
    }

    if (isset($_POST['editar_colaborador'])) {
        $idcol = mysqli_real_escape_string($conexao, $_POST['idcol']);

        $nomecol = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $conselhocol = mysqli_real_escape_string($conexao, trim($_POST['conselho']));
        $cpfcol = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
        $datnascimentocol = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
        $datcadastrocol = mysqli_real_escape_string($conexao, trim($_POST['data_cadastro']));
        $emailcol = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $cepcol = mysqli_real_escape_string($conexao, trim($_POST['cep']));
        $enderecocol = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
        $numcol = mysqli_real_escape_string($conexao, trim($_POST['numero']));
        $bairrocol = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
        $cidadecol = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
        $ufcol = mysqli_real_escape_string($conexao, trim($_POST['uf']));
        $complementocol = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
        $observacaocol = mysqli_real_escape_string($conexao, trim($_POST['observacao']));

        $sql = "UPDATE colaboradores SET nomecol = '$nomecol', conselhocol = '$conselhocol', cpfcol ='$cpfcol', datnascimentocol = '$datnascimentocol',
        datcadastrocol = '$datcadastrocol', emailcol = '$emailcol', cepcol = '$cepcol', enderecocol = '$enderecocol', numcol = '$numcol', bairrocol = '$bairrocol',
        cidadecol = '$cidadecol', ufcol = '$ufcol', complementocol = '$complementocol', observacaocol = '$observacaocol' WHERE idcol = $idcol";
       
        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'USUÁRIO EDITADO COM SUCESSO!';     
            header('Location: ../pages/colaboradores.php');
            exit;
        } else {
            $_SESSION['mensagem'] = 'USUÁRIO NÃO EDITADO.';
            header('Location: ../pages/colaboradores.php');
            exit;
        }
    }

    if (isset($_POST['deletar_colaborador'])) {
        $idcol = mysqli_real_escape_string($conexao, $_POST['deletar_colaborador']);
        
        $sql = "DELETE FROM colaboradores WHERE idcol = $idcol";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['message'] = "USUÁRIO DELETADO COM SUCESSO!";
            header('Location: ../pages/colaboradores.php');
            exit;
        } else {
            $_SESSION['message'] = "USUÁRIO NÃO DELETADO.";
            header('Location: ../pages/colaboradores.php');
            exit;

        }
    }
    
    if (isset($_POST['pesquisar_colaborador'])) {
        

        $pesquisar = ($_GET['pesquisarcol']);

        
        var_dump($pesquisar);
    }
?>