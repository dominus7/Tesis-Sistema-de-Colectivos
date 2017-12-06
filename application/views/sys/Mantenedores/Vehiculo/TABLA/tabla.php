<? if ($cantidad == 0): ?>
    <table id="myTable" class="table table-hover">
        <thead align="center">
            <th>No registra Datos!!</th>    
        </thead>
    </table>       
<? else: ?>
    <table id="myTable" class="table table-hover">
        <thead align="center">
        <th>N°</th>    
        <th>Año</th>
        <th>Patente</th>
        <th>Caja de Cambio</th> 
        <th>Kilometraje Inicial</th>
        <th>Combustible</th>
        <th>Estado</th> 
    </thead>
    <tbody> 
               
        <? $i = 0; ?>        
        <?php foreach ($datos as $filas): ?>                      
                <? $i++; ?>      
                <tr id="<?= $filas['idVehiculo'];?>" vista="MantenedorVehiculo" estado="<?= $filas['estado']; ?>" align="center">
                    <td><?= $i;?></td>
                    <td><?= $filas['ano']; ?></td>
                    <td><?= $filas['patente']; ?></td>
                    <td><?= $filas['cajaCambio']; ?></td>
                    <td><?= $filas['kmInicial']; ?></td>
                    <td><?= $filas['combustible']; ?></td>
                    <td><?= $filas['estado']; ?></td>
                </tr>                        
        <?php endforeach; ?>        
    </tbody>
    </table>
<? endif;?>