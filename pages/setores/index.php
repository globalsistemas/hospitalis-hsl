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
    require_once ("../../components/nav.php");
    require_once("../../DAO/conexao.php");
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card listagens">
                <div class="card-header">
                    <h4>Lista de Setores
                        <a href="../../pages/setores/criar-setores.php" class="btn btn-primary float-end">Adicionar Novo</a>
                    </h4>
                </div>
                <?php require_once ("../../pages/mensagem.php"); ?>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <?php require_once ("../../pages/mensagem.php"); ?>
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descrição</th>
                                <th scope="col" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = 'SELECT * FROM setores ORDER BY descricaoset';
                                $setores = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($setores) > 0) {
                                    foreach ($setores as $setor) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $setor['idset'] ?></th>
                                <td class="text-uppercase"><?= $setor['descricaoset'] ?></td>
                                <td class="w-25">
                                    <a href="<?= $caminho . '../pages/setores/ver-setores.php?idset=' . $setor["idset"];  ?>" class="btn btn-secondary btn-sm" title="Visualizar">
                                        <span class="bi-eye-fill"></span></a>
                                    <a href="<?= $caminho . '../pages/setores/editar-setores.php?idset=' . $setor["idset"];  ?>" class="btn btn-success btn-sm" title="Editar">
                                        <span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho . '../controllers/acoes-setores.php' ?>" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_setor" value="<?= $setor['idset'] ?>" class="btn btn-danger btn-sm">
                                            <span class="bi-trash3-fill"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                                    } // FOREACH
                                } else {
                                    echo '<h5>NENHUM SETOR ENCONTRADO!</h5>';
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