<?php
    $title = "COLABORADORES";
    $caminho = ""; 
    require_once("../components/header.php");
    session_start();
    require_once("../DAO/conexao.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-3">Pesquisar Colaboradores</h4>
                    <form action="" method="get">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Pesquisa</span>
                                <input type="text" name="pesquisar" aria-label="Pesquisar" class="form-control text-uppercase">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group mb-3">
                                <button type="submit"  class="btn btn-secondary float-end w-100">
                                    Pesquisar
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Selecionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                    
                                if (isset($_GET['pesquisar'])) {
                                    $pesquisar = mysqli_real_escape_string($conexao, $_GET['pesquisar']);
                                    $sql = "SELECT * FROM colaboradores WHERE nomecol LIKE '%$pesquisar%' OR cpfcol LIKE '%$pesquisar%' ORDER BY nomecol";
                                    $query = mysqli_query($conexao, $sql);
                                    
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $colaborador) { 
                            ?>
                            <tr>
                                <td class="text-uppercase"><?= ($colaborador['nomecol']); ?></td>
                                <td><?= ($colaborador['cpfcol']); ?></td>
                                <td class="text-center w-25">
                                    <a href="../pages/usuarios/criar-usuarios.php?idcol=<?= $colaborador['idcol'] ?>" class="btn btn-success btn-sm" title="Selecionar"><span class="bi bi-check-circle"></span></a>
                                </td>
                            </tr>
                            
                        </tbody>
                    <?php 
                            }
                        } else {
                            echo "<h5>USUÁRIO NÃO ENCONTRADO!</h5>";
                        }
                        }
                    ?>
                    </table>
                    <a href="<?= $caminho . '../pages/usuarios/criar-usuarios.php' ?>" class="btn btn-light float-end">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once("../components/footer.php");
?>