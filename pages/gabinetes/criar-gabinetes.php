
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "COMPUTADORES (GABINETES)";
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
                        <a href="../../pages/gabinetes" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="../../controllers/acoes-gabinetes.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Marca</span>
                            <input type="text" name="marcagab" aria-label="Marca" class="form-control text-uppercase" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Processador</span>
                            <input type="text" name="processadorgab" aria-label="Processador" class="form-control text-uppercase" required>
                        </div>    
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Memória</span>
                                    <input type="text" name="memoriagab" aria-label="Memoria" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Tipo:</span>
                                    <select class="form-select bg-dark text-white" name="armazenamentogab" aria-label="Armazenamento" text-uppercase required>
                                        <option disabled selected>HDD/SSD</option>
                                        <option value="HDD">HDD</option>
                                        <option value="SSD">SSD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Tamanho</span>
                                    <input type="text" name="tamarmazenamentogab" aria-label="Tamanho Armazenamento" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="datcadastrogab" aria-label="Data Cadastro" class="form-control" value='<?php echo date("Y-m-d"); ?>' readonly>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Observação</span>
                            <input type="text" name="observacaogab" aria-label="observacao" class="form-control text-uppercase">
                        </div>                        
                        <div class="mb-3">
                            <button type="submit" name="criar_gabinetes" class="btn btn-success float-end">
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