<body>
<header>
<div class="header-tit">
  <div id="wrapper">
    <a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W . 'pub/theme/k/' . $logo; ?>"/></a>
    <h1><?= $titol; ?>
    </h1>
  </div>
</div>
<div class="regist">
  <?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/ 
    $destino = 'login/login';
    $texto_boton = "Entrar";
    if(isset($_SESSION['user'])){ $destino = 'salir';$texto_boton = 'home/Salir';}
  ?>

  <form class="reg" name="formlog" method="post" action="<?= APP_W.$destino; ?>">
  <?php 
  if($destino == 'login/login'){  ?>
    <label for="nusuario">Nombre Usuario: <input type="text" name="usuario" value="" placeholder="nombre de usuario" required></label>
    <label for="password">Password: <input type="password" name="password" required></label>
    <input type="submit" class="bEntra" value="<?= $texto_boton?>" id="logsend">
  <?php 
  }else{ ?>

 <!--echo $_SESSION['user']; ?> </p> -->
  <?php 
  } ?>        
  </form>
</div>
</header>