
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
                        <a href="<?= $caminho; ?>../pages/mouses" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body" >
                    <?php 
                        if (isset($_GET['idmou'])) {
                            $idmou = mysqli_real_escape_string($conexao, $_GET['idmou']);
                            $sql = "SELECT * FROM mouses WHERE idmou='$idmou'";
                            $query = mysqli_query($conexao, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $mouse = mysqli_fetch_array($query);
                    ?>
                    <input type="hidden" name="idmou" value="<?= ($mouse['idmou']); ?>">
                    <div class="row"> <!--Linha Nome-->
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Descrição</span>
                                <input type="text" name="descricaomou" aria-label="Descricao" class="form-control text-uppercase" required
                                readonly value="<?= ($mouse['descricaomou']); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Conexão</span>
                                <select class="form-select bg-dark text-white" name="conexaomou" aria-label="Armazenamento" text-uppercase required disabled>
                                    <option <?= ($mouse['conexaomou'] == "") ? 'selected' : '' ?>></option>
                                    <option <?= ($mouse['conexaomou'] == "Com cabo") ? 'selected' : '' ?>>Com cabo</option>
                                    <option <?= ($mouse['conexaomou'] == "Sem cabo") ? 'selected' : '' ?>>Sem cabo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!--Linha Nome-->
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Observação</span>
                                <input type="text" name="observacaomou" aria-label="Observacao" class="form-control text-uppercase"
                                readonly value="<?= ($mouse['observacaomou']); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Cadastro</span>
                                <input type="date" name="datcadastromou" aria-label="Data Cadastro" class="form-control"
                                readonly value="<?= ($mouse['datcadastromou']); ?>">
                            </div>
                        </div>
                    </div>                      
                    <div class="mb-3">
                        <a href="<?= $caminho . '../pages/mouses/editar-mouses.php?idmou=' . $mouse["idmou"];  ?>" class="btn btn-success float-end">Editar</a>
                    </div>
                    <?php 
                            } else {
                                echo "<h5>MOUSE NÃO ENCONTRADO!</h5>";
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