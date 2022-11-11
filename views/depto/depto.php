<?php if(isset($_SESSION['error']['empty-field'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['empty-field'] ?></strong></div>
<?php elseif(isset($_SESSION['msg']['success'])): ?>
    <div class="sub"><strong class="green"><?=$_SESSION['msg']['success'] ?></strong></div>
<?php elseif(isset($_SESSION['msg']['error'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['msg']['error'] ?></strong></div>
<?php endif; ?>
<?php Utils::deleteSession('error') ?>
<?php Utils::deleteSession('msg') ?>


<div class="form-add-depto">
    <form class="formDeptoAdd" action="<?=base_url?>depto/add" method="post">
        <div class="sub">
            <h2>Agregar Departamento/Área</h2>
        </div>  
        <div class="mb-3">
            <label for="user" class="form-label">Nombre Departamento/Área:</label>
            <input type="text" class="form-control" id="depto" name="depto" >
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<!---------------------------- Lista ------------------------------->

<div class="sub">
    <h2>Listado de Departamentos/Áreas</h2>
</div>        
<hr>
<table class="table table-bordered table-info table-striped">
    <thead>
        <tr>
            <th scope="col">Nro</th>
            <th scope="col">Departamento</th>
            <!-- Para botones -->
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1;?>
        <?php while($listDepto = $deptos->fetch_object()): ?>
        <tr>
            <th scope="row"><?=$count?></th>
            <td><?=isset($listDepto->depto) ? $listDepto->depto : "--" ?></td>
            <td>
                <a class="btn btn-danger" href="<?=base_url?>depto/delete&id=<?=$listDepto->id_depto?>" role="button">Eliminar</a>                    
            </td>
        </tr>
        <?php $count++;?>
        <?php endwhile; ?>
        
    </tbody>
    </table>