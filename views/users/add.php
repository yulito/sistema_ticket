<!--errores-->
<?php if(isset($_SESSION['error']['empty-fields'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['empty-fields'] ?></strong></div>
<?php elseif(isset($_SESSION['error']['is_string'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['is_string'] ?></strong></div>
<?php elseif(isset($_SESSION['error']['email'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['email'] ?></strong></div>
<?php elseif(isset($_SESSION['error']['max'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['max'] ?></strong></div>
<?php elseif(isset($_SESSION['error']['min'])): ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['min'] ?></strong></div>
<?php elseif(isset($_SESSION['msn']['error-post'])):?>
    <div class="sub"><strong class="red"><?=$_SESSION['msn']['error-post'] ?></strong></div>
<?php elseif(isset($_SESSION['msn']['error'])):?>
    <div class="sub"><strong class="red"><?=$_SESSION['msn']['error'] ?></strong></div>
<?php elseif(isset($_SESSION['msn']['success'])):?>
    <div class="sub"><strong class="green"><?=$_SESSION['msn']['success'] ?></strong></div>
<?php endif; ?>
<?php Utils::deleteSession('error') ?>
<?php Utils::deleteSession('msn') ?>

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

<div class="sub">
    <h2>Listado de Usuarios</h2>
</div>        
<hr>
<table class="table table-bordered table-info table-striped">
    <thead>
        <tr>
            <th scope="col">Nro</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Departamento</th>
            <th scope="col">Perfil</th>
            <!-- Para botones -->
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1;?>
        <?php while($listUser = $list->fetch_object()): ?>
        <tr>
            <th scope="row"><?=$count?></th>
            <td><?=$listUser->nombre ?></td>
            <td><?=$listUser->correo ?></td>
            <td><?=$listUser->depto ?></td>
            <td><?=$listUser->tipo ?></td>
            <td>
                <button type="button" class="btn btn-warning">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>                    
            </td>
        </tr>
        <?php $count++;?>
        <?php endwhile; ?>
        
    </tbody>
    </table>