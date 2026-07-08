
<?php 
    $title = "USUÁRIOS";
    $csspeculiar = "";
    $caminho = "../";
    require_once ("../../components/header.php");
    require_once ("../../components/nav.php");
    require_once("../../DAO/conexao.php");
    session_start();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card listagens">
                <div class="card-header">
                    <h4>Lista de Usuários
                        <a href="../../pages/usuarios/criar-usuarios.php" class="btn btn-primary float-end">Adicionar Novo</a>
                    </h4>
                </div>
                <?php require_once ("../../pages/mensagem.php"); ?>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <?php require_once ("../../pages/mensagem.php"); ?>
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Login</th>
                                <th scope="col" >Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = 'SELECT usuarios.*, col.idcol, col.nomecol FROM usuarios INNER JOIN colaboradores AS col ON usuarios.idcol = col.idcol;';
                                $usuarios = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($usuarios) > 0) {
                                    foreach ($usuarios as $usuario) {         
                            ?>
                            <tr>
                                <th scope="row"><?= $usuario['idusu'] ?></th>
                                <td class="text-uppercase"><?= $usuario['nomecol'] ?></td>
                                <td><?= $usuario['nomeusu'] ?></td>
                                <td>
                                    <a href="<?= $caminho . '../pages/usuarios/editar-usuarios.php?idusu=' . $usuario["idusu"];  ?>" class="btn btn-success btn-sm" title="Editar"><span class="bi-pencil-fill"></span></a>
                                    <form action="<?= $caminho . '../controllers/acoes-usuarios.php' ?>" method="POST" class="d-inline">
                                        <button title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="deletar_usuario" value="<?= $usuario['idusu'] ?>" class="btn btn-danger btn-sm">
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