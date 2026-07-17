

<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "TECLADOS";
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
                    <h4>Dados Teclado
                        <a href="<?= $caminho; ?>../pages/teclados" class="btn btn-light float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body" >
                    <?php 
                        if (isset($_GET['idtec'])) {
                            $idtec = mysqli_real_escape_string($conexao, $_GET['idtec']);
                            $sql = "SELECT * FROM teclados WHERE idtec='$idtec'";
                            $query = mysqli_query($conexao, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $teclado = mysqli_fetch_array($query);
                    ?>
                    <input type="hidden" name="idtec" value="<?= ($teclado['idtec']); ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Descrição</span>
                        <input type="text" name="descricaotec" aria-label="Descricao" class="form-control text-uppercase" required
                        value="<?= ($teclado['descricaotec']); ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Conexão</span>
                                <select class="form-select bg-dark text-white" name="conexaotec" aria-label="Conexão" text-uppercase required>
                                    <option <?= ($teclado['conexaotec'] == "") ? 'selected' : '' ?>></option>
                                    <option <?= ($teclado['conexaotec'] == "Com cabo") ? 'selected' : '' ?>>Com cabo</option>
                                    <option <?= ($teclado['conexaotec'] == "Sem cabo") ? 'selected' : '' ?>>Sem cabo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Série</span>
                                <input type="text" name="serietec" aria-label="Serie" class="form-control text-uppercase" required
                                value="<?= ($teclado['serietec']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Data Cadastro</span>
                                <input type="date" name="datcadastrotec" aria-label="Data Cadastro" class="form-control" value="<?= ($teclado['datcadastrotec']); ?>" 
                                readonly>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Observação</span>
                        <input type="text" name="observacaotec" aria-label="Observacao" class="form-control text-uppercase" 
                        value="<?= ($teclado['observacaotec']); ?>">
                    </div>                
                    <div class="mb-3">
                        <a href="<?= $caminho . '../pages/teclados/editar-teclados.php?idtec=' . $teclado["idtec"];  ?>" class="btn btn-success float-end">Editar</a>
                    </div>
                    <?php 
                            } else {
                                echo "<h5>TECLADO NÃO ENCONTRADO!</h5>";
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