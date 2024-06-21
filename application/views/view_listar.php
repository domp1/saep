<div class="row mt-5">
        <h1>Listagem de Viagens</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Gastos</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($viagens as $viagem): ?>
                <tr>
                    <td><?php echo $viagem->nome?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('index.php/Motorista/gastos/'.$viagem->idviagens)?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Ver Gastos
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo base_url('index.php/Motorista/excluir/'.$viagem->idviagens)?>">
                            <i class="fa fa-trash" aria-hidden="true"></i> Excluir Viagem
                        </a>
                    </td>       
                </tr>
                <?php endforeach?>
            </tbody>
        </table>

        <div class="row d-inline ">
            <button class="btn btn-secondary mt-2 py-2 fs-4" style="width: 400px;">Adicionar Viagem</button>
        </div>
    </div>