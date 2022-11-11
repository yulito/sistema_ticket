<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tickets</title>
    <link rel="shortcut icon" href="<?=base_url?>STTI.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url?>statics/css/style.css">
</head>
<body>
    <header>
        <!------- Aquí debe ir el logo de la pagina ------->
        <div class="titulo">
            <h1>Sistema de tickets</h1>
            <img src="<?=base_url?>statics/images/tickects.png" alt="logo">
        </div>
    </header>

    <main>    
        <!------- Contenido principal ------->
    <div class="container"> 

    <?php if(isset($_SESSION['user']['regular'])): ?>

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <strong><?=$_SESSION['user']['regular']->nombre ?></strong></a> 


                <!-- Agregar y listar tickets -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?=base_url ?>">Agregar</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url?>ticket/standby">Pendientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url?>ticket/inprocess">En proceso</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url?>ticket/resolved">Resueltos</a>
                    </li>

                    <?php if(isset($_SESSION['user']['admin'])) : ?>
                            
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url?>usuario/check">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url?>depto/check">Departamentos</a>
                        </li>

                    <?php endif; ?>
                </ul>


                <a class="navbar-brand" href="<?=base_url?>usuario/logout">
                    <div id="logout">X</div>
                </a>
                
            </div>
        </nav>                    

        
        
    <?php endif; ?>