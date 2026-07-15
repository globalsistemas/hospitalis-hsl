
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
                    <h4>Dados Monitor
                        <a href="../../pages/monitores" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($_GET['idmon'])) {
                            $idmon = mysqli_real_escape_string($conexao, $_GET['idmon']);
                            $sql = "SELECT * FROM monitores WHERE idmon='$idmon'";
                            $query = mysqli_query($conexao, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $monitor = mysqli_fetch_array($query);
                    ?>
                    <input type="hidden" name="idmon" value="<?= ($monitor['idmon']); ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Descrição</span>
                        <input type="text" name="descricaomon" aria-label="Descricao" class="form-control text-uppercase" required readonly
                        value="<?= ($monitor['descricaomon']); ?>">
                    </div>
                    <div class="row"> <!--Linha Nome-->
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Polegadas</span>
                                <input type="text" name="polegadasmon" aria-label="Polegadas" class="form-control text-uppercase" required
                                readonly value="<?= ($monitor['polegadasmon']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Série</span>
                                <input type="text" name="seriemon" aria-label="Serie" class="form-control text-uppercase" required readonly
                                value="<?= ($monitor['seriemon']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Cadastro</span>
                                <input type="date" name="datcadastrogmon" aria-label="Data Cadastro" class="form-control" readonly 
                                value="<?= ($monitor['datcadastromon']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Observação</span>
                        <input type="text" name="observacaomon" aria-label="observacao" class="form-control text-uppercase" readonly
                        value="<?= ($monitor['observacaomon']); ?>">
                    </div>                        
                    <div class="mb-3">
                        <a href="<?= $caminho . '../pages/monitores/editar-monitores.php?idmon=' . $monitor["idmon"];  ?>" class="btn btn-success float-end">Editar</a>
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