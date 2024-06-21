<nav class="navbar navbar-expand-lg " style="background-color: #44484B; color: white;">
    <div class="container-fluid">
    <?php if(isset($motorista)){?>
            <h1 class="col-6 px-4 pt-2 fs-2">Bem vindo, <?php echo $motorista?></h1>
            <a class="btn btn-danger px-3 pt-2 mx-3 my-2 fs-5" href="<?php echo base_url('index.php/')?>">
            <i class="fa fa-pencil" aria-hidden="true"></i>Sair do Sistema</a>
    <?php }else {?>
        <div class="display-flex flex-direction-inline col-12 px-4 pt-2 fs-2 ">
            <h2 class="col-12 px-4 pt-2 fs-1">Click Bus</h2>
        </div>
    <?php }?>
    </div>
</nav>