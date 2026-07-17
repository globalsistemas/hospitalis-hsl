

<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "SETORES";
    $csspeculiar = "";
    $caminho = "../";
    require_once ("../../components/header.php");
    require_once("../../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Novo
                        <a href="../../pages/teclados" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../../controllers/acoes-teclados.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descrição</span>
                            <input type="text" name="descricaotec" aria-label="Descricao" class="form-control text-uppercase" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Conexão</span>
                                    <select class="form-select bg-dark text-white" name="conexaotec" aria-label="Conexão" text-uppercase required>
                                        <option disabled selected></option>
                                        <option value="Com cabo">Com cabo</option>
                                        <option value="Sem cabo">Sem cabo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Série</span>
                                    <input type="text" name="serietec" aria-label="Serie" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="datcadastrotec" aria-label="Data Cadastro" class="form-control" value='<?php echo date("Y-m-d"); ?>' readonly>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Observação</span>
                            <input type="text" name="observacaotec" aria-label="Observacao" class="form-control text-uppercase">
                        </div>                       
                        <div class="mb-3">
                            <button type="submit" name="criar_teclado" class="btn btn-success float-end">
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
    require_once($caminho . "../components/footer.php");
?>