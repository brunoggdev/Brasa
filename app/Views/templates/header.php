<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?=$titulo??'Brasa - Novo Projeto Ci4'?></title>
    <meta name="description" content="Novo Projeto Ci4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    
    <!-- Bootstrap e jQuery -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script> const BASE_URL = '<?=base_url()?>'; </script>
    <?=importarJS('helpers_brasa', true)?>

    <?php if(url_is('/') || url_is('/login')): ?>
        <link rel="stylesheet" href="<?= base_url('brasa.css?v=' . VERSION ?? '') ?>">
    <?php endif; ?>
</head>
<body>

<?php if( usuario('logado') ): ?>
   <!-- Como renderizar algo apenas se o usuário estiver logado -->

    <!-- Como renderizar algo para usuário logado é admin ou comum dinamicamente-->
    <?php 
    if( usuario('is_admin') ){
        template('menu_admin');
    }else{
        template('menu_comum');
    }
    ?>

<?php endif; ?>

<?php if( url_is('/login') ): ?>
   <!-- Como renderizar algo baseado na url -->
<?php endif; ?>