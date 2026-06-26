
<?php 
    if (isset($_SESSION['mensagem'])):
?>

<div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-3" role="alert">
    <?= $_SESSION['mensagem']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php 
    unset($_SESSION['mensagem']);
    endif;
?>