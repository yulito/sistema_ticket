<!--errores-->




<div class="form-edit-user">
    <form class="formUserEdit" action="<?=base_url?>usuario/modify" method="post">
        <div class="sub">
            <h2>Editar usuario</h2>
        </div>
        <hr>  
        <input type="hidden" name="idUsuario" value="<?=$one->id_usuario?>">
        <div class="mb-3">
            <label for="user" class="form-label"><strong>Nombre: </strong><?=$one->nombre?></label>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label"><strong>Correo: </strong><?=$one->correo?></label>
        </div>
        <!-- debe de ir un while -->        
        <select class="form-select mb-3" aria-label="select depto" name="depto">
            <option selected disabled><?=$one->depto?></option>

            <?php while($depto = $deptos->fetch_object()) : ?>
            <option value="<?=$depto->id_depto ?>"><?=$depto->depto ?></option>
            <?php endwhile; ?>

        </select>
        
        <select class="form-select mb-3" aria-label="select tipo" name="tipo">
            <option selected disabled><?=$one->tipo?></option>
            
            <?php while($tipo = $tipos->fetch_object()) : ?>
            <option value="<?=$tipo->id_tipo ?>"><?=$tipo->tipo ?></option>
            <?php endwhile; ?>

        </select>

        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</div>