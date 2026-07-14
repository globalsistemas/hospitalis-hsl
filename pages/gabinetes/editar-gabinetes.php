

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
                    <h4>Editar Gabinete
                        <a href="../../pages/gabinetes" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($_GET['idgab'])) {
                            $idgab = mysqli_real_escape_string($conexao, $_GET['idgab']);
                            $sql = "SELECT * FROM gabinetes WHERE idgab='$idgab'";
                            $query = mysqli_query($conexao, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $setor = mysqli_fetch_array($query);
                    ?>
                    <form action="<?= $caminho; ?>../controllers/acoes-gabinetes.php" method="POST">
                        <input type="hidden" name="idgab" value="<?= ($setor['idgab']); ?>">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Marca</span>
                            <input type="text" name="marcagab" aria-label="Marca" class="form-control text-uppercase" required 
                            value="<?= ($setor['marcagab']); ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Processador</span>
                            <input type="text" name="processadorgab" aria-label="Processador" class="form-control text-uppercase" required 
                            value="<?= ($setor['processadorgab']); ?>">
                        </div>    
                        <div class="row"> <!--Linha Nome-->
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Memória</span>
                                    <input type="text" name="memoriagab" aria-label="Memoria" class="form-control text-uppercase" required
                                    value="<?= ($setor['memoriagab']); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Tipo:</span>
                                    <select class="form-select bg-dark text-white" name="armazenamentogab" aria-label="Armazenamento" text-uppercase required>
                                        <option selected>HDD/SSD</option>
                                        <option value="HDD">HDD</option>
                                        <option value="SSD">SSD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Tamanho</span>
                                    <input type="text" name="tamarmazenamentogab" aria-label="Tamanho Armazenamento" class="form-control text-uppercase" required
                                    value="<?= ($setor['tamarmazenamentogab']); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data Cadastro</span>
                                    <input type="date" name="datcadastrogab" aria-label="Data Cadastro" class="form-control" value="<?= ($setor['datcadastrogab']); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Observação</span>
                            <input type="text" name="observacaogab" aria-label="observacao" class="form-control text-uppercase" value="<?= ($setor['observacaogab']); ?>">
                        </div>                        
                        <div class="mb-3">
                            <button type="submit" name="editar_gabinetes" class="btn btn-success float-end">
                                Salvar
                            </button>
                        </div>
                    </form>
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
</div>

<?php
    require_once($caminho . "../components/footer.php");
?>