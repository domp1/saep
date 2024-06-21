<div class="card mt-5">
    <div class="card-header fs-4" style="font-weight: 600; ">Atenção</div> 
    <div class="card-body">
            <div class="row">
            <form method="post" action="<?php echo base_url('index.php/Motorista/proibido_exclusao/'. $viagem); ?>">
                <p>Esta viagem não pode ser apagada, pois possui gastos.</p>
                <!-- Input oculto para enviar a confirmação -->
                <input type="hidden" name="confirmacao" value="confirmacao">
                <!-- Botão de envio -->
                <button name="botao" value="sim" type="submit">Ok</button>
            </form>
        </div>
    </div>
</div>