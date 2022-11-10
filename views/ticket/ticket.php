
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
        <li class="bloque"><span id="anuncio">Estado ticket: </span> <?=$one->estado?></li>
        <li class="bloque"><span id="anuncio">Solución: </span> <?=isset($one->solucion) ? $one->solucion : "--"?></li>
        <?php if(isset($_SESSION['user']['admin'])) : ?>
            <li class="bloque"><span id="anuncio">Área: </span> <?=$one->depto?></li>
            <li class="bloque"><span id="anuncio">Usuario: </span> <?=$one->nombre?></li>
        <?php endif; ?>
    </ul>
</div>