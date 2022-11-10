 <!----------------------------------------------------------------------------------->
 <div class="sub">
    <h2><strong class="<?=$nomEstado?>"><?=$nomEstado?></strong></h2>
</div>    

<table class="table table-bordered table-info table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Asunto</th>
            <th scope="col">Emisión</th>
            <th scope="col">Resolución</th>
            <th scope="col">Área</th>
            <th scope="col">Usuario</th>
            <!-- Para botones -->
            <th scope="col">Info</th>
            <?php if(isset($_SESSION['user']['admin'])):?>
            <th scope="col">Acción</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        <?php while($ticket = $list->fetch_object()): ?>
        <tr>
            <th scope="row"><?=$count?></th>
            <td><?=$ticket->asunto ?></td>
            <td><?=$ticket->fecemision ?></td>
            <td><?=isset($ticket->fecsolucion) ? $ticket->fecsolucion : "--"?></td>
            <td><?=$ticket->depto ?></td>
            <td><?=$ticket->nombre ?></td>
            <td>
                <a class="btn btn-info" href="<?=base_url?>ticket/watch&id=<?=$ticket->id_ticket?>" role="button">Ver</a>
            </td>
                <?php if(isset($_SESSION['user']['admin'])):?>
                <td>
                <a class="btn btn-warning" href="#" role="button">Editar</a>
                <a class="btn btn-danger" href="#" role="button">Eliminar</a>                
                </td>                
                <?php endif; ?>
        </tr>
        <?php $count++ ; ?>
        <?php endwhile; ?>
    </tbody>
    </table>