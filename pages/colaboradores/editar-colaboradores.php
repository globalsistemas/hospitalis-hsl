<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }

    $caminho = "../";
    $title = "EDITAR/COLABORADORES";
    $csspeculiar = $caminho . "../assets/css/login.css";
    require_once($caminho . "../DAO/conexao.php");
    require_once($caminho . "../components/header.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Colaborador
                        <a href="<?= $caminho; ?>../pages/colaboradores" class="btn btn-light float-end">Voltar</a>
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
                    <form action="<?= $caminho; ?>../controllers/acoes-colaboradores.php" method="POST">
                        <input type="hidden" name="idcol" value="<?= $colaborador['idcol'] ?>">
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nome</span>
                                    <input type="text" name="nome" aria-label="Nome" class="form-control text-uppercase" required value="<?= ($colaborador['nomecol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Conselho</span>
                                    <input type="number" name="conselho" aria-label="Conselho" class="form-control" value="<?= ($colaborador['conselhocol']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!-- Linhas das datas-->
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CPF</span>
                                    <input type="text" name="cpf" aria-label="CPF" class="form-control" required placeholder="000.000.000-00" value="<?= ($colaborador['cpfcol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Nascimento</span>
                                    <input type="date" name="data_nascimento" aria-label="Data Nascimento" class="form-control" value="<?= ($colaborador['datnascimentocol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="data_cadastro" aria-label="Data Cadastro" class="form-control" value="<?= ($colaborador['datcadastrocol']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha E-mail-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">E-mail</span>
                                    <input type="email" name="email" aria-label="E-Mail" class="form-control" required value="<?= ($colaborador['emailcol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CEP</span>
                                    <input type="text" name="cep" aria-label="CEP" class="form-control" value="<?= ($colaborador['cepcol']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Endereço-->
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Endereço</span>
                                    <input type="text" name="endereco" aria-label="Endereco" class="form-control text-uppercase" value="<?= ($colaborador['enderecocol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Número</span>
                                    <input type="number" name="numero" aria-label="Numero" class="form-control" value="<?= ($colaborador['numcol']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Cidade-->
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Bairro</span>
                                    <input type="text" name="bairro" aria-label="Bairro" class="form-control text-uppercase" value="<?= ($colaborador['bairrocol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Cidade</span>
                                    <input type="text" name="cidade" aria-label="Cidade" class="form-control text-uppercase" value="<?= ($colaborador['cidadecol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">UF</span>
                                    <select class="form-select bg-dark text-white" name="uf" >
                                        <option <?= ($colaborador['ufcol'] == "") ? 'selected' : '' ?>></option>
                                        <option value="AC" <?= ($colaborador['ufcol'] == "AC") ? 'selected' : '' ?>>AC</option>
                                        <option value="AL" <?= ($colaborador['ufcol'] == "AL") ? 'selected' : '' ?>>AL</option>
                                        <option value="AM" <?= ($colaborador['ufcol'] == "AM") ? 'selected' : '' ?>>AM</option>
                                        <option value="AP" <?= ($colaborador['ufcol'] == "AP") ? 'selected' : '' ?>>AP</option>
                                        <option value="BA" <?= ($colaborador['ufcol'] == "BA") ? 'selected' : '' ?>>BA</option>
                                        <option value="CE" <?= ($colaborador['ufcol'] == "CE") ? 'selected' : '' ?>>CE</option>
                                        <option value="DF" <?= ($colaborador['ufcol'] == "DF") ? 'selected' : '' ?>>DF</option>
                                        <option value="ES" <?= ($colaborador['ufcol'] == "ES") ? 'selected' : '' ?>>ES</option>
                                        <option value="GO" <?= ($colaborador['ufcol'] == "GO") ? 'selected' : '' ?>>GO</option>
                                        <option value="MA" <?= ($colaborador['ufcol'] == "MA") ? 'selected' : '' ?>>MA</option>
                                        <option value="MG" <?= ($colaborador['ufcol'] == "MG") ? 'selected' : '' ?>>MG</option>
                                        <option value="MS" <?= ($colaborador['ufcol'] == "MS") ? 'selected' : '' ?>>MS</option>
                                        <option value="MT" <?= ($colaborador['ufcol'] == "MT") ? 'selected' : '' ?>>MT</option>
                                        <option value="PA" <?= ($colaborador['ufcol'] == "PA") ? 'selected' : '' ?>>PA</option>
                                        <option value="PB" <?= ($colaborador['ufcol'] == "PB") ? 'selected' : '' ?>>PB</option>
                                        <option value="PE" <?= ($colaborador['ufcol'] == "PE") ? 'selected' : '' ?>>PE</option>
                                        <option value="PI" <?= ($colaborador['ufcol'] == "PI") ? 'selected' : '' ?>>PI</option>
                                        <option value="PR" <?= ($colaborador['ufcol'] == "PR") ? 'selected' : '' ?>>PR</option>    
                                        <option value="RJ" <?= ($colaborador['ufcol'] == "RJ") ? 'selected' : '' ?>>RJ</option>
                                        <option value="RN" <?= ($colaborador['ufcol'] == "RN") ? 'selected' : '' ?>>RN</option>
                                        <option value="RO" <?= ($colaborador['ufcol'] == "RO") ? 'selected' : '' ?>>RO</option>
                                        <option value="RR" <?= ($colaborador['ufcol'] == "RR") ? 'selected' : '' ?>>RR</option>
                                        <option value="RS" <?= ($colaborador['ufcol'] == "RS") ? 'selected' : '' ?>>RS</option>
                                        <option value="SC" <?= ($colaborador['ufcol'] == "SC") ? 'selected' : '' ?>>SC</option>
                                        <option value="SE" <?= ($colaborador['ufcol'] == "SE") ? 'selected' : '' ?>>SE</option>
                                        <option value="SP" <?= ($colaborador['ufcol'] == "SP") ? 'selected' : '' ?>>SP</option>
                                        <option value="TO" <?= ($colaborador['ufcol'] == "TO") ? 'selected' : '' ?>>TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Complemento-->
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Complemento</span>
                                    <input type="text" name="complemento" aria-label="complemento" class="form-control text-uppercase" value="<?= ($colaborador['complementocol']); ?>">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Observação</span>
                                    <input type="text" name="observacao" aria-label="observacao" class="form-control text-uppercase" value="<?= ($colaborador['observacaocol']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="editar_colaborador" class="btn btn-success float-end">
                                Salvar
                            </button>
                        </div>
                    </form>
                    <?php 
                            }
                        } else {
                            echo "<h5>USUÁRIO NÃO ENCONTRADO</h5>";
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