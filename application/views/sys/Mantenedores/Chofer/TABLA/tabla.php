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
        
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Rut</th>
        <th>Email</th>
        <th>Estado</th> 
        
    </thead>
    <tbody> 
               
        <? $i = 0; ?>        
        <?php foreach ($datos as $filas): ?>                      
                <? $i++; ?>      
                <tr id="<?= $filas['idChofer'];?>" vista="MantenedorChofer" estado="<?= $filas['Estado']; ?>" align="center">
                    <td><?= $i;?></td>
                    <td><?= $filas['Nombre']; ?></td>
                    <td><?= $filas['Apellidos']; ?></td>
                    <td><?= $filas['RUN']; ?></td>
                    <td><?= $filas['Correo']; ?></td>
                    <td><?= $filas['Estado']; ?></td>                   
                </tr>                        
        <?php endforeach; ?>        
    </tbody>
    </table>
<? endif;?>