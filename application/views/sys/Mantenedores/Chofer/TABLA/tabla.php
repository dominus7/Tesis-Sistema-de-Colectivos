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
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Encargado</th>    
        <th>Estado</th> 
        
    </thead>
    <tbody> 
               
        <? $i = 0; ?>        
        <?php foreach ($datos as $filas): ?>                      
                <? $i++; ?>      
                <tr id="<?= $filas['idChofer'];?>" vista="MantenedorChofer" estado="<?= $filas['estadoC']; ?>" align="center">
                    <td><?= $i;?></td>
                    <td><?= $filas['runC']; ?></td>        
                    <td><?= $filas['nombreC']; ?></td>
                    <td><?= $filas['apellidoPC']; ?></td>
                    <td><?= $filas['apellidoMC']; ?></td>
                    <td><?= $filas['direccionC']; ?></td>
                    <td><?= $filas['telefonoC']; ?></td>
                    <td><?= $filas['emailC']; ?></td>
                    <td><?= $filas['Encargado']; ?></td>
                    <td><?= $filas['estadoC']; ?></td>                   
                </tr>                        
        <?php endforeach; ?>        
    </tbody>
    </table>
<? endif;?>