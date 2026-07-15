

<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "MONITORES";
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
                    <h4>Lista de Monitores
                        <a href="../../pages/monitores/criar-monitores.php" class="btn btn-primary float-end">Adicionar Novo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <?php require_once ($caminho . "../components/mensagem.php"); ?>
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Polegadas</th>
                                <th scope="col" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = 'SELECT * FROM monitores ORDER BY descricaomon';
                                $monitores = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($monitores) > 0) {
                                    foreach ($monitores as $monitor) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $monitor['idmon'] ?></th>
                                <td class="text-uppercase"><?= $monitor['descricaomon'] ?></td>
                                <td class="text-uppercase"><?= $monitor['polegadasmon'] ?></td>
                                <td class="w-25">
                                    <a href="<?= $caminho . '../pages/monitores/ver-monitores.php?idmon=' . $monitor["idmon"];  ?>" class="btn btn-secondary btn-sm" title="Visualizar">
                                        <span class="bi-eye-fill"></span></a>
                                    <a href="<?= $caminho . '../pages/monitores/editar-monitores.php?idmon=' . $monitor["idmon"];  ?>" class="btn btn-success btn-sm" title="Editar">
                                        <span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho . '../controllers/acoes-monitores.php' ?>" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_monitor" 
                                        value="<?= $monitor['idmon'] ?>" class="btn btn-danger btn-sm">
                                            <span class="bi-trash3-fill"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    } // FOREACH
                                } else {
                                    echo '<h5>NENHUM MONITOR ENCONTRADO!</h5>';
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