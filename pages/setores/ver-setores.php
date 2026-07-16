
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
                <div class="card-body" >
                    <?php 
                        if (isset($_GET['idset'])) {
                            $idset = mysqli_real_escape_string($conexao, $_GET['idset']);
                            $sql = "SELECT * FROM setores WHERE idset='$idset'";
                            $query = mysqli_query($conexao, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $setor = mysqli_fetch_array($query);
                    ?>
                    <div class="row"> <!--Linha Nome-->
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Descrição</span>
                                <input type="text" name="descricaoset" aria-label="Descricao" class="form-control text-uppercase" required readonly
                                value="<?= ($setor['descricaoset']); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Cadastro</span>
                                <input type="date" name="data_cadastro" aria-label="Data Cadastro" class="form-control" readonly
                                value="<?= ($setor['datcadastro']); ?>"'>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Observação</span>
                        <input type="text" name="observacao" aria-label="observacao" class="form-control text-uppercase" readonly
                        value="<?= ($setor['observacaoset']); ?>">
                    </div>                        
                    <div class="mb-3">
                        <a href="<?= $caminho . '../pages/setores/editar-setores.php?idset=' . $setor["idset"];  ?>" class="btn btn-success float-end">Editar</a>
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