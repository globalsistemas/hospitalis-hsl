<?php
    $caminho = "../";
    session_start();
    require_once($caminho . "../DAO/conexao.php");
    $title = "USUÁRIOS/EDITAR";
    require_once($caminho . "../components/header.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Usuário
                        <a href="<?= $caminho . '../pages/usuarios'; ?>" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($_GET['idusu'])) {
                            $idusu = mysqli_real_escape_string($conexao, $_GET['idusu']);
                            $sql = "SELECT usu.*, col.nomecol, col.cpfcol, col.emailcol FROM usuarios AS usu JOIN colaboradores AS col 
                            ON usu.idcol=col.idcol WHERE idusu='$idusu'";
                            $query = mysqli_query($conexao, $sql);
                        
                            if (mysqli_num_rows($query) > 0) {
                                $usuario = mysqli_fetch_array($query);
                            
                    ?>
                    

                    <form action="<?= $caminho . '../controllers/acoes-usuarios.php' ?>" method="POST">
                        <input type="hidden" name="idusu" value="<?= ($usuario['idusu']); ?>">
                        <input type="hidden" name="idcol" value="<?= ($usuario['idcol']); ?>">
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nome</span>
                                    <input type="text" name="nome" aria-label="Nome" class="form-control text-uppercase" required readonly 
                                    value="<?= ($usuario['nomecol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CPF</span>
                                    <input type="text" name="cpf" aria-label="CPF" class="form-control text-uppercase" required readonly 
                                    value="<?= ($usuario['cpfcol']); ?>">
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
                                    value="<?= ($usuario['emailcol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="data_cadastro" aria-label="Data Cadastro" class="form-control" value="<?= ($usuario['datcadastrousu']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!-- Linhas do login-->
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Login</span>
                                    <input type="text" name="login" aria-label="LOGIN" class="form-control" required value="<?= ($usuario['nomeusu']); ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Senha</span>
                                    <input type="password" name="senha" aria-label="SENHA" class="form-control" value="<?= ($usuario['senhausu']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="editar_usuario" class="btn btn-success float-end">
                                Salvar
                            </button>
                        </div>
                    </form>

                    <?php 
                            }
                        }
                    ?>




                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($caminho . "../components/footer.php");
?>