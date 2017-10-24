<?php foreach ($accionVista as $filas): ?>                 
    <li onclick="accionContentMenu('<?= $filas['accion'];?>','<?= $filas['vista']; ?>')"><a tabindex="-1"><span class="<?= $filas['Icono'];?>"></span><?= $filas['accion'];?></a></li>
<?php endforeach; ?> 