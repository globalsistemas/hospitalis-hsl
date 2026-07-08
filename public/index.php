<?php
    $title = "HOME";
    $caminho = "";
    require_once("../components/header.php");
    //$statusMenu = "disabled";
    require_once("../components/nav.php");
    require '../DAO/conexao.php';
?>

    <!--Hero section-->
    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <img src="../assets/img/logo_sombra.png" class="img-fluid" alt="Hospital da Fundação Casa de Caridade São Lourenço">
        </div>
    </section>
    <!--Fim Hero Section-->

<?php
    require_once("../components/footer.php");
?>