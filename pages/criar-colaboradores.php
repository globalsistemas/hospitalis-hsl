<?php
    $title = "COLABORADORES";
    require_once("../components/header.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Novo
                        <a href="../pages/colaboradores.php" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../controllers/acoes.php" method="POST">
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nome</span>
                                    <input type="text" name="nome" aria-label="Nome" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Conselho</span>
                                    <input type="number" name="conselho" aria-label="Conselho" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!-- Linhas das datas-->
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CPF</span>
                                    <input type="text" name="cpf" aria-label="CPF" class="form-control" required placeholder="000.000.000-00">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Nascimento</span>
                                    <input type="date" name="data_nascimento" aria-label="Data Nascimento" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="data_cadastro" aria-label="Data Cadastro" class="form-control" value='<?php echo date("Y-m-d"); ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha E-mail-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">E-mail</span>
                                    <input type="email" name="email" aria-label="E-Mail" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CEP</span>
                                    <input type="text" name="cep" aria-label="CEP" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Endereço-->
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Endereço</span>
                                    <input type="text" name="endereco" aria-label="Endereco" class="form-control text-uppercase">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Número</span>
                                    <input type="number" name="numero" aria-label="Numero" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Cidade-->
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Bairro</span>
                                    <input type="text" name="bairro" aria-label="Bairro" class="form-control text-uppercase">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Cidade</span>
                                    <input type="text" name="cidade" aria-label="Cidade" class="form-control text-uppercase">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">UF</span>
                                    <!--<input type="text" name="uf" aria-label="Uf" class="form-control text-uppercase" maxlength="2">-->
                                    <select class="form-select bg-dark text-white" name="uf" >
                                        <option selected></option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Complemento-->
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Complemento</span>
                                    <input type="text" name="complemento" aria-label="complemento" class="form-control text-uppercase">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Observação</span>
                                    <input type="text" name="observacao" aria-label="observacao" class="form-control text-uppercase">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="criar_colaborador" class="btn btn-success float-end">
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
    require_once("../components/footer.php");
?>