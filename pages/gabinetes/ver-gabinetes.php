
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "GABINETES";
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
                    <h4>Dados Gabinete
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
                                $gabinete = mysqli_fetch_array($query);
                    ?>
                    <input type="hidden" name="idgab" value="<?= ($gabinete['idgab']); ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Marca</span>
                        <input type="text" name="marcagab" aria-label="Marca" class="form-control text-uppercase" required readonly
                        value="<?= ($gabinete['marcagab']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Processador</span>
                        <input type="text" name="processadorgab" aria-label="Processador" class="form-control text-uppercase" required readonly
                        value="<?= ($gabinete['processadorgab']); ?>">
                    </div>    
                    <div class="row"> <!--Linha Nome-->
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Memória</span>
                                <input type="text" name="memoriagab" aria-label="Memoria" class="form-control text-uppercase" required readonly
                                value="<?= ($gabinete['memoriagab']); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tipo:</span>
                                <select class="form-select bg-dark text-white" name="armazenamentogab" aria-label="Armazenamento" text-uppercase 
                                required disabled>
                                    <option <?= ($gabinete['armazenamentogab'] == "") ? 'selected' : '' ?>>HDD/SSD</option>
                                    <option value="HDD" <?= ($gabinete['armazenamentogab'] == "HDD") ? 'selected' : '' ?>>HDD</option>
                                    <option value="SSD" <?= ($gabinete['armazenamentogab'] == "SSD") ? 'selected' : '' ?>>SSD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tamanho</span>
                                <input type="text" name="tamarmazenamentogab" aria-label="Tamanho Armazenamento" class="form-control text-uppercase" 
                                required readonly value="<?= ($gabinete['tamarmazenamentogab']); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Cadastro</span>
                                <input type="date" name="datcadastrogab" aria-label="Data Cadastro" class="form-control" readonly
                                value="<?= ($gabinete['datcadastrogab']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Observação</span>
                        <input type="text" name="observacaogab" aria-label="observacao" class="form-control text-uppercase" 
                        readonly value="<?= ($gabinete['observacaogab']); ?>">
                    </div>                        
                    <div input-group class="mb-3">
                        <a href="<?= $caminho . '../pages/gabinetes/editar-gabinetes.php?idgab=' . $gabinete["idgab"];  ?>" class="btn btn-success float-end">Editar</a>
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
</div>

<?php
    require_once($caminho . "../components/footer.php");
?>