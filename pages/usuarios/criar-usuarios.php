<?php
    $title = "USUÁRIOS";
    $caminho = "../";
    $csspeculiar = "../assets/css/pesquisa-usuario.css";
    $jspeculiar = "../assets/js/pesquisa.js";
    require_once("../../components/header.php");
    session_start();
    require_once("../../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Novo
                        <a href="<?= $caminho . '../pages/usuarios' ?>" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($_GET['idcol'])) {
                            $idcol = mysqli_real_escape_string($conexao, $_GET['idcol']);
                            $sql = "SELECT * FROM colaboradores WHERE idcol='$idcol'";
                            $query = mysqli_query($conexao, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $colaborador = mysqli_fetch_array($query);
                                $idcol = $colaborador['idcol'];
                                $nome = $colaborador['nomecol'];
                                $cpf = $colaborador['cpfcol'];
                                $email = $colaborador['emailcol'];
                            }
                        } else {
                            $nome = "";
                            $cpf = "";
                            $email = "";
                        }
                    ?>
                    <form action="<?= $caminho . '../controllers/acoes-usuarios.php' ?>" method="POST">
                        <input type="hidden" name="idcol" value="<?= $idcol; ?>">
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nome</span>
                                    <input type="text" name="nome" aria-label="Nome" class="form-control text-uppercase" required readonly 
                                    value="<?= $nome; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CPF</span>
                                    <input type="text" name="cpf" aria-label="CPF" class="form-control text-uppercase" required readonly 
                                    value="<?= $cpf; ?>">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <a href="<?= $caminho . '../pages/pesquisar-colaboradores.php' ?>" class="btn btn-secondary float-end">Pesquisar</a>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha E-mail-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">E-mail</span>
                                    <input type="email" name="email" aria-label="E-Mail" class="form-control" required readonly 
                                    value="<?= $email; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="data_cadastro" aria-label="Data Cadastro" class="form-control" value='<?php echo date("Y-m-d"); ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!-- Linhas do login-->
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Login</span>
                                    <input type="text" name="login" aria-label="LOGIN" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Senha</span>
                                    <input type="password" name="senha" aria-label="SENHA" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="criar_usuario" class="btn btn-success float-end">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once("../../components/footer.php");
?>