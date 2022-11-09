<?php if(isset($_SESSION['error']['empty-fields'])) : ?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['empty-fields'] ?></strong></div>
<?php elseif(isset($_SESSION['error']['email'])) :?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['email'] ?></strong></div>
<?php elseif(isset($_SESSION['error']['identification'])) :?>
    <div class="sub"><strong class="red"><?=$_SESSION['error']['identification'] ?></strong></div>
<?php endif; ?>

<?php Utils::deleteSession('error') ?>

<div class="form-login">
    <form class="formLogin" action="<?=base_url?>usuario/login" method="post">
        <div class="sub">
            <h2>Login</h2>
        </div>      
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>