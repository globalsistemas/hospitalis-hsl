
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "gabinetes";
    $csspeculiar = "";
    $caminho = "../";
    require_once ("../../components/header.php");
    require_once ("../../components/nav.php");
    require_once("../../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card listagens">
                <div class="card-header">
                    <h4>Lista de Computadores (Gabinetes)
                        <a href="../../pages/gabinetes/criar-gabinetes.php" class="btn btn-primary float-end">Adicionar Novo</a>
                    </h4>
                </div>
                <?php require_once ("../../pages/mensagem.php"); ?>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <?php require_once ("../../pages/mensagem.php"); ?>
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Processador</th>
                                <th scope="col" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = 'SELECT * FROM gabinetes ORDER BY marcagab';
                                $gabinetes = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($gabinetes) > 0) {
                                    foreach ($gabinetes as $gabinete) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $gabinete['idgab'] ?></th>
                                <td class="text-uppercase"><?= $gabinete['marcagab'] ?></td>
                                <td class="text-uppercase"><?= $gabinete['processadorgab'] ?></td>
                                <td class="w-25">
                                    <a href="<?= $caminho . '../pages/gabinetes/ver-gabinetes.php?idset=' . $gabinete["idgab"];  ?>" class="btn btn-secondary btn-sm" title="Visualizar">
                                        <span class="bi-eye-fill"></span></a>
                                    <a href="<?= $caminho . '../pages/gabinetes/editar-gabinetes.php?idset=' . $gabinete["idgab"];  ?>" class="btn btn-success btn-sm" title="Editar">
                                        <span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho . '../controllers/acoes-gabinetes.php' ?>" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_gabinete" 
                                        value="<?= $gabinete['idgab'] ?>" class="btn btn-danger btn-sm">
                                            <span class="bi-trash3-fill"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    } // FOREACH
                                } else {
                                    echo '<h5>NENHUM GABINETE ENCONTRADO!</h5>';
                                }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once($caminho . "../components/footer.php");
?>