<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['nomecol'])) {
       header('Location: ../../pages/login');
       exit;
    }

    $title = "COLABORADORES";
    $caminho = "../";
    $csspeculiar = "";
    require_once($caminho . "../components/header.php");
    require_once($caminho . "../components/nav.php");
    require_once($caminho . "../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card listagens">
                <div class="card-header">
                    <h4>Lista de Colaboradores
                        <a href="<?= $caminho . '../pages/colaboradores/criar-colaboradores.php'; ?>" class="btn btn-primary float-end">Adicionar Novo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <?php require_once ($caminho . "../components/mensagem.php"); ?>
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col" class="w-25">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = 'SELECT * FROM colaboradores';
                                $colaboradores = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($colaboradores) > 0) {
                                    foreach ($colaboradores as $colaborador) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $colaborador['idcol'] ?></th>
                                <td class="text-uppercase"><?= $colaborador['nomecol'] ?></td>
                                <td><?= $colaborador['emailcol'] ?></td>
                                <td>
                                    <a href="<?= $caminho; ?>../pages/colaboradores/ver-colaboradores.php?idcol=<?= $colaborador['idcol']; ?>" class="btn btn-secondary btn-sm" title="Visualizar"><span class="bi-eye-fill"></span></a>  
                                    <a href="<?= $caminho; ?>../pages/colaboradores/editar-colaboradores.php?idcol=<?= $colaborador['idcol'] ?>" class="btn btn-success btn-sm" title="Editar"><span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho; ?>../controllers/acoes-colaboradores.php" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_colaborador" value="<?= $colaborador['idcol'] ?>" class="btn btn-danger btn-sm">
                                            <span class="bi-trash3-fill"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           <?php
                                    } // FOREACH
                                } else {
                                    echo '<h5>NENHUM USUÁRIO ENCONTRADO!</h5>';
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