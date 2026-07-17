
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
    require_once ("../../components/nav.php");
    require_once("../../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card listagens">
                <div class="card-header">
                    <h4>Lista de Teclados
                        <a href="../../pages/teclados/criar-teclados.php" class="btn btn-primary float-end">Adicionar Novo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <?php require_once ($caminho . "../components/mensagem.php"); ?>
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Conexão</th>
                                <th scope="col" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = 'SELECT * FROM teclados ORDER BY descricaotec';
                                $teclados = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($teclados) > 0) {
                                    foreach ($teclados as $teclado) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $teclado['idtec'] ?></th>
                                <td class="text-uppercase"><?= $teclado['descricaotec'] ?></td>
                                <td class="text-uppercase"><?= $teclado['conexaotec'] ?></td>
                                <td class="w-25">
                                    <a href="<?= $caminho . '../pages/teclados/ver-teclados.php?idtec=' . $teclado["idtec"];  ?>" class="btn btn-secondary btn-sm" title="Visualizar">
                                        <span class="bi-eye-fill"></span></a>
                                    <a href="<?= $caminho . '../pages/teclados/editar-teclados.php?idtec=' . $teclado["idtec"];  ?>" class="btn btn-success btn-sm" title="Editar">
                                        <span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho . '../controllers/acoes-teclados.php' ?>" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_teclado" 
                                        value="<?= $teclado['idtec'] ?>" class="btn btn-danger btn-sm">
                                            <span class="bi-trash3-fill"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    } // FOREACH
                                } else {
                                    echo '<h5>NENHUM TECLADO ENCONTRADO!</h5>';
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