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
        <th>Descripcion</th>
        <th>Monto</th>
        <th>Fecha</th> 
        <th>Estado</th>    
    </thead>
    <tbody> 
               
        <? $i = 0; ?>        
        <?php foreach ($datos as $filas): ?>                      
                <? $i++; ?>      
                <tr id="<?= $filas['idTipoPago'];?>" vista="MantenedorTipoPago" estado="<?= $filas['estado']; ?>" align="center">
                    <td><?= $i;?></td>

                    <td><?= $filas['nombre']; ?></td>        
                    <td><?= $filas['monto']; ?></td>
                    <td><?= $filas['fecha']; ?></td>
                    <td><?= $filas['estado']; ?></td>
                    
                </tr>                        
        <?php endforeach; ?>        
    </tbody>
    </table>
<? endif;?>