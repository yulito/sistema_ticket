<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <?=$_SESSION['user']['regular']->nombre ?></a> 
        <a class="navbar-brand" href="<?=base_url?>usuario/logout">
            <div id="logout">X</div>
        </a>
        
    </div>
</nav>                    

<!-- Agregar y listar tickets -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Principal</a> <!-- Ojo con el active -->
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Pendientes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">En proceso</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Resueltos</a>
    </li>

    <?php if(isset($_SESSION['user']['admin'])) : ?>
            
        <li class="nav-item">
            <a class="nav-link" href="#">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Departamentos</a>
        </li>

    <?php endif; ?>

</ul>

<!-- Agregar Ticket -->        
<div class="form-add-ticket">
    <form class="formTicket-add" action="" method="post">
    <div class="sub">
        <h2>Agregar Ticket</h2>
    </div>
    
        <div class="mb-3">
            <label for="asunto" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Problema con ...">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <!-- Aquí debe ser un select anidado -->
        <select class="form-select mb-3" aria-label="select depto" name="depto">
            <option selected>Departamento</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

        <select class="form-select mb-3" aria-label="select user" name="usuario" disabled>
            <option selected>Usuarios</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <!------------------------------------->
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>