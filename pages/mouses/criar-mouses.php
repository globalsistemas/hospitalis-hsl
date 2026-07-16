
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
                        <a href="../../pages/mouses" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../../controllers/acoes-mouses.php" method="POST">
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Descrição</span>
                                    <input type="text" name="descricaomou" aria-label="Descricao" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Conexão</span>
                                    <select class="form-select bg-dark text-white" name="conexaomou" aria-label="Conexão" text-uppercase required>
                                        <option disabled selected></option>
                                        <option value="Com cabo">Com cabo</option>
                                        <option value="Sem cabo">Sem cabo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Observação</span>
                                    <input type="text" name="observacaomou" aria-label="Observacao" class="form-control text-uppercase">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="datcadastromou" aria-label="Data Cadastro" class="form-control" value='<?php echo date("Y-m-d"); ?>'>
                                </div>
                            </div>
                        </div>                        
                        <div class="mb-3">
                            <button type="submit" name="criar_mouse" class="btn btn-success float-end">
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