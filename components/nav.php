
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    //HABILITA OU DESABILITA MENU SE ESTIVER LOGADO.
    if (isset($_SESSION['nomecol'])) {
        $statusMenu = "";
    } else {
        $statusMenu = "Disabled";
    }
?>

<!--NavBar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="#">Hospitalis - HSL</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Hospitalis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="<?= $caminho . '../public/' ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="https://hospsl.com.br/links" target="_blank">Links Úteis</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Portfolio</a>
                        </li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" <?php echo $statusMenu; ?>>
                                Equipamentos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="<?= $caminho . '../pages/computadores'; ?>">Computadores</a></li>
                                <li><a class="dropdown-item" href="<?= $caminho . '../pages/computadores'; ?>">Monitores</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= $caminho . '../pages/computadores'; ?>">Manutenção</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" <?php echo $statusMenu; ?>>
                                Cadastros
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="<?= $caminho . '../pages/colaboradores.php'; ?>">Colaboradores</a></li>
                                <li><a class="dropdown-item" href="<?= $caminho . '../pages/setores'; ?>">Setores</a></li>
                                <!--<li><a class="dropdown-item" href="#">Cidades</a></li>-->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= $caminho . '../pages/usuarios/' ?>">Usuários</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
                
                // Verifique se o usuário está logado
                if (isset($_SESSION['nomecol'])) { 
            ?>
                <!-- Exibe o nome do usuário e o botão de sair -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-uppercase">Olá, <?php echo htmlspecialchars($_SESSION['nomecol']); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Trocar senha</a></li>
                        <li><a class="dropdown-item" href="#">Meus dados</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="../../pages/login/logout.php" class="dropdown-item logout-button">Sair</a></li>
                    </ul>
                </div>
            <?php 
                } else { 
            ?>
                    <!-- Exibe o botão de login padrão -->
                    <a href="../pages/login" class="login-button">Login</a>
            <?php 
                } 
            ?>
            
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


