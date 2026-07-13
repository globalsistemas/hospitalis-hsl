
<?php
    $title = "COLABORADORES";
    $caminho = "../";
    require_once($caminho . "../components/header.php");
    require_once($caminho . "../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Novo
                        <a href="<?= $caminho . "../pages/colaboradores"; ?>" class="btn btn-light float-end">Voltar</a>
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
                    ?>
                    <div class="row"> <!--Linha Nome-->
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nome</span>
                                <input type="text" name="nome" aria-label="Nome" class="form-control text-uppercase" 
                                value="<?= ($colaborador['nomecol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Conselho</span>
                                <input type="number" name="conselho" aria-label="Conselho" class="form-control" value="<?= ($colaborador['conselhocol']); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!-- Linhas das datas-->
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">CPF</span>
                                <input type="text" name="cpf" aria-label="CPF" class="form-control" value="<?= ($colaborador['cpfcol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Nascimento</span>
                                <input type="date" name="data_nascimento" aria-label="Data Nascimento" class="form-control" value="<?= ($colaborador['datnascimentocol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Cadastro</span>
                                <input type="date" name="data_cadastro" aria-label="Data Cadastro" class="form-control" value="<?= ($colaborador['datcadastrocol']); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!--Linha E-mail-->
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <span class="input-group-text">E-mail</span>
                                <input type="email" name="email" aria-label="E-Mail" class="form-control" value="<?= ($colaborador['emailcol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">CEP</span>
                                <input type="text" name="cep" aria-label="CEP" class="form-control" value="<?= ($colaborador['cepcol']); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!--Linha Endereço-->
                        <div class="col-md-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Endereço</span>
                                <input type="text" name="endereco" aria-label="Endereco" class="form-control text-uppercase" value="<?= ($colaborador['enderecocol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Número</span>
                                <input type="number" name="numero" aria-label="Numero" class="form-control" value="<?= ($colaborador['numcol']); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!--Linha Cidade-->
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Bairro</span>
                                <input type="text" name="bairro" aria-label="Bairro" class="form-control text-uppercase" value="<?= ($colaborador['bairrocol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Cidade</span>
                                <input type="text" name="cidade" aria-label="Cidade" class="form-control text-uppercase" value="<?= ($colaborador['cidadecol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group mb-3">
                                <span class="input-group-text">UF</span>
                                <input type="text" name="uf" aria-label="Uf" class="form-control text-uppercase" value="<?= ($colaborador['ufcol']); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!--Linha Complemento-->
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Complemento</span>
                                <input type="text" name="complemento" aria-label="complemento" class="form-control text-uppercase" value="<?= ($colaborador['complementocol']); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Observação</span>
                                <input type="text" name="observacao" aria-label="observacao" class="form-control text-uppercase" value="<?= ($colaborador['observacaocol']); ?>" readonly>
                            </div>
                        </div>
                    </div>
                <div class="mb-3"></div>
                    <a href="../pages/editar-colaboradores.php?idcol=<?= $colaborador['idcol'] ?>" class="btn btn-success float-end">Editar</a>
                </div>
                <?php 
                        } else {
                            echo "<h5>USUÁRIO NÃO ENCONTRADO!</h5>";
                        }
                        }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($caminho . "../components/footer.php");
?>