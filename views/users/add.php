<div class="form-add-user">
    <form class="formUserAdd" action="" method="post">
        <div class="sub">
            <h2>Agregar usuario</h2>
        </div>  
        <div class="mb-3">
            <label for="user" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="user" name="user" >
        </div>

        <select class="form-select mb-3" aria-label="select depto" name="depto">
            <option selected>Departamentos</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
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