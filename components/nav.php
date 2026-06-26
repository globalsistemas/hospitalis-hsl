<!--NavBar-->
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
                            <a class="nav-link mx-lg-2" aria-current="page" href="../public/">Home</a>
                        </li>
                        <li class="nav-item" disable>
                            <a class="nav-link mx-lg-2" href="https://hospsl.com.br/links" target="_blank">Links Úteis</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Portfolio</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Contatos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= $statusMenu ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastros
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../pages/colaboradores.php">Colaboradores</a></li>
                                <li><a class="dropdown-item" href="#">Computadores</a></li>
                                <li><a class="dropdown-item" href="#">Cidades</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Usuários</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="../pages/login.php" class="login-button">Login</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>