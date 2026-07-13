
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    /**if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }**/
    
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
                        <a href="../../pages/setores" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../../controllers/acoes-setores.php" method="POST">
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Descrição</span>
                                    <input type="text" name="descricaoset" aria-label="Descricao" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="datcadastro" aria-label="Data Cadastro" class="form-control" value='<?php echo date("Y-m-d"); ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Observação</span>
                            <input type="text" name="observacao" aria-label="observacao" class="form-control text-uppercase">
                        </div>                        
                        <div class="mb-3">
                            <button type="submit" name="criar_setor" class="btn btn-success float-end">
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