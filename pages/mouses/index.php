
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }
    
    $title = "MOUSES";
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
                    <h4>Lista de Mouses
                        <a href="../../pages/mouses/criar-mouses.php" class="btn btn-primary float-end">Adicionar Novo</a>
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
                                $sql = 'SELECT * FROM mouses ORDER BY descricaomou';
                                $mouses = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($mouses) > 0) {
                                    foreach ($mouses as $mouse) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $mouse['idmou'] ?></th>
                                <td class="text-uppercase"><?= $mouse['descricaomou'] ?></td>
                                <td class="text-uppercase"><?= $mouse['conexaomou'] ?></td>
                                <td class="w-25">
                                    <a href="<?= $caminho . '../pages/mouses/ver-mouses.php?idmou=' . $mouse["idmou"];  ?>" class="btn btn-secondary btn-sm" title="Visualizar">
                                        <span class="bi-eye-fill"></span></a>
                                    <a href="<?= $caminho . '../pages/mouses/editar-mouses.php?idmou=' . $mouse["idmou"];  ?>" class="btn btn-success btn-sm" title="Editar">
                                        <span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho . '../controllers/acoes-mouses.php' ?>" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_mouse" 
                                        value="<?= $mouse['idmou'] ?>" class="btn btn-danger btn-sm">
                                            <span class="bi-trash3-fill"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    } // FOREACH
                                } else {
                                    echo '<h5>NENHUM MOUSE ENCONTRADO!</h5>';
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