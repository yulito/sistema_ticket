

<!-- Agregar Ticket -->        
<div class="form-add-ticket">
    <form class="formTicket-add" action="<?= base_url?>ticket/add" method="post">
    <div class="sub">
        <h2>Agregar Ticket</h2>
    </div>   
    
    <?php if(isset($_SESSION['error']['empty-fields'])): ?>
        <div class="sub"><strong class="red"><?=$_SESSION['error']['empty-fields'] ?></strong></div>
    <?php elseif(isset($_SESSION['msn']['error'])):?>
        <div class="sub"><strong class="red"><?=$_SESSION['msn']['error'] ?></strong></div>
    <?php elseif(isset($_SESSION['msn']['success'])):?>
        <div class="sub"><strong class="green"><?=$_SESSION['msn']['success'] ?></strong></div>
    <?php endif; ?>
    <?php Utils::deleteSession('error') ?>
    <?php Utils::deleteSession('msn') ?>

        <div class="mb-3">
            <label for="asunto" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Problema con ...">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>        
        <!------------------------------------->
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>