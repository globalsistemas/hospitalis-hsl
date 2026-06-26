
<?php 
    //require_once ("../configuration/config.php");

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', 'root');
    define('DB', 'hsl');
    $conexao = mysqli_connect(HOST, USER, PASS, DB) or die ('NÃO FOI POSSÍVEL CONECTAR AO BANCO');
?>