 <!----------------------------------------------------------------------------------->
 <div class="sub">
    <h2>Listado de tickets</h2>
</div>        
<table class="table table-bordered table-info table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Asunto</th>
            <th scope="col">Emisión</th>
            <th scope="col">Resolución</th>
            <th scope="col">Estado</th>

            <th scope="col">Usuario</th>
            <!-- Para botones -->
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Pantallazo azul</td>
            <td>04/11/2022</td>
            <td>--</td>
            <td class="estado">Pendiente</td>
            <td>Karina</td>
            <td>
                <button type="button" class="btn btn-warning">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>                    
            </td>
        </tr>
        <tr>
        <th scope="row">2</th>
            <td>El teclado no funciona correctamente</td>
            <td>16/11/2022</td>
            <td>16/12/2022</td>
            <td class="estado">Resuelto</td>
            <td>Marcelo</td>
            <td>
                <button type="button" class="btn btn-warning">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        
    </tbody>
    </table>