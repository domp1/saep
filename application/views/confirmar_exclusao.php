<div class="card mt-5">
    <div class="card-header fs-4" style="font-weight: 600;">Atenção</div> 
    <div class="card-body">
            <div class="row">
            <form method="post" action="<?php echo base_url('index.php/Motorista/confirmar_exclusao/'. $viagem); ?>">
                <p>Deseja realmente excluir o item?</p>
                <!-- Input oculto para enviar a confirmação -->
                <input type="hidden" name="confirmacao" value="confirmacao">
                <!-- Botão de envio -->
                <button name="botao" value="sim" type="submit">Sim</button>

                <!-- Botão de envio -->
                <button name="botao" value="nao" type="submit">Não</button>
            </form>
        </div>
    </div>
</div>