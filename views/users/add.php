<div class="form-add-user">
    <form class="formUserAdd" action="<?=base_url?>usuario/add" method="post">

        <div class="sub">
            <h2>Agregar usuario</h2>
        </div>  
        <div class="mb-3">
            <label for="user" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="user" name="user" >
        </div>

        <!-- debe de ir un while -->        
        <select class="form-select mb-3" aria-label="select depto" name="depto">
            <option selected disabled>Departamentos</option>

            <?php while($depto = $deptos->fetch_object()) : ?>
            <option value="<?=$depto->id_depto ?>"><?=$depto->depto ?></option>
            <?php endwhile; ?>

        </select>
        
        <select class="form-select mb-3" aria-label="select tipo" name="tipo">
            <option selected disabled>Tipo Usuario</option>
            
            <?php while($tipo = $tipos->fetch_object()) : ?>
            <option value="<?=$tipo->id_tipo ?>"><?=$tipo->tipo ?></option>
            <?php endwhile; ?>

        </select>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (máx 10 caracteres)</label>
            <input type="password" class="form-control" id="pass" name="password" maxlength="10">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>