<div class="card container-sm mt-5"> 
    <div class="card-body">
        <div class="row mt-3 mb-4 fs-2">
            <h3>Bem vindo à página de login</h3>
        </div>
        <div class=" row">
            <form action="/pablo-vieira/simulado-pratico/index.php/Motorista/verificar_login" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>  
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>
                <button type="submit" class="btn btn-primary px-3 py-2 fs-4">Submit</button>
            </form>
            <?php if(isset($msg)){ ?>
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $msg ?></h5>
                        <p class="card-text">Tente novamente</p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
</div>
