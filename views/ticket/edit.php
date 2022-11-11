

<div class="sub">
    <h2>Editar</h2>
</div> 
<div >
    <label for=""><strong id="anuncio">Asunto: </strong><?=$one->asunto?></label>
</div> 

<div class="list">
    <hr>
    <label for=""><span id="anuncio">Descripcion:</span></label>
    <p class="text-break">
        <?=$one->descripcion?>
    </p>
    <hr>
    <ul>
        <li class="bloque"><span id="anuncio">Emitido: </span> <?=$one->fecemision?></li>
        <li class="bloque"><span id="anuncio">Solucionado: </span> <?=isset($one->fecsolucion) ? $one->fecsolucion : "--"?></li>        
        
        <?php if(isset($_SESSION['user']['admin'])) : ?>
            <li class="bloque"><span id="anuncio">Área: </span> <?=$one->depto?></li>
            <li class="bloque"><span id="anuncio">Usuario: </span> <?=$one->nombre?></li>
        <?php endif; ?>
    </ul>
    <hr>
    <form action="<?=base_url?>ticket/modify" method="post">
        <label for="">
            <span id="anuncio">Estado ticket: </span>
        </label>

        <input type="hidden" name="idTicket" value="<?=$one->id_ticket?>">

            <select name="estado" id="">
                <option value="<?=$one->id_estado?>" selected><?=$one->estado?></option>
                <?php while($est = $estado->fetch_object()) : ?>
                <?php if($one->estado != $est->estado) :?>
                <option value="<?=$est->id_estado?>"> <?=$est->estado?> </option>
                <?php endif; ?>
                <?php endwhile; ?>
            </select>

        <div>            
            <label for=""><span id="anuncio">Solución: </span></label>
            <br>
            <textarea name="solucion" id="" cols="80" rows="6"><?=$one->solucion ?></textarea>
            <hr>
        </div>    
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</div>