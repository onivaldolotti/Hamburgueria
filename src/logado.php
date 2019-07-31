<?php require_once 'cabecalho.php' ?>
<?php

require 'check.php'
?>
<div class="row">
    <div class="col-md-12">
        <h2>Seja bem-vindo ao Sistema Valbernielson's Hambuergueria</h2>
        <p>Selecione uma das opções do Menu para começar a usar o Sistema</p><br>
        <p>Bem-vindo, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>
    </div>
</div>
<?php require_once 'rodape.php' ?>
