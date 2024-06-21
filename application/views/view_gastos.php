<div class="card mt-5">
    <div class="card-header fs-4" style="font-weight: 600;">
        Viagem: <?php echo $viagem->{'nome'};?>
    </div> 
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h5 class="card-title fs-5 mb-4">Gastos:</h5>
                    <?php for($i=0; $i< count($gastos); $i++){
                    ?><p class="card-text"><?php echo $gastos[$i]->{'descricao'};?></p><?php
                        }?>
                </div>
            </div>
        </div>
</div>