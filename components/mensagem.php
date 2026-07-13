
<?php 
    if (isset($_SESSION['mensagem'])):
?>

<div class="alert <?= $_SESSION['tipoalert']; ?> alert-dismissible fade show w-50 mx-auto mt-3 text-center" role="alert">
    <?= $_SESSION['mensagem']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php 
    unset($_SESSION['mensagem']);
    endif;
?>