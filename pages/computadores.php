
<?php 
    require_once ('../DAO/conexao.php');
?>




<div class="container mt-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card listagens">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <form action="">
                                                                    <div class="col-md-10">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Pesquisa</span>
                                                                            <input type="text" name="busca" aria-label="Pesquisa" class="form-control text-uppercase">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="input-group mb-3">
                                                                            <button type="submit"  class="btn btn-secondary float-end">
                                                                                Pesquisar
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
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
                                                                        $pesquisa = mysqli_real_escape_string($conexao, $_POST['busca']);
                                                                        var_dump($pesquisa);
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-uppercase">Teste 2</td>
                                                                        <td>Teste 3</td>
                                                                        <td class="text-center w-25">
                                                                            <a href="#" class="btn btn-success btn-sm" title="Selecionar"><span class="bi bi-check-circle"></span></a>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>