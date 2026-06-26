<?php
    $title = "LOGIN";
    require_once("../components/header.php");
?>


    <div class="d-flex justify-content-center align-items-center vh-100 p-3">
        <div class="login-card">
            <h2 class="fw-bold text-center mb-4">Login</h2>
            <form action="">
                <!--Usuário-->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Usuário">
                </div>
                <!--Senha-->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Senha">
                </div>

                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div>
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label">Lembrar-me</label>
                    </div>
                    <a href="#" class="text-white small text-decoration-none ms-4">Esqueceu a senha?</a>
                </div>
                <button class="btn btn-light w-100 text-dark fw-semibold">Entrar</button>
                <p class="paragrafo text-end">
                    <a href="../public/index.php" class="text-white fw-semibold text-decoration-none ms-4">Sair</a>
                </p>
            </form>
        </div>

    </div>


<?php
    require_once("../components/footer.php");
?>