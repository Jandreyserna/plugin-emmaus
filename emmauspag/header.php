<!doctype html>
<html>
<head>
  <meta charset=utf-8>
  <?php wp_head() ?>

</head>
<body>
  <?php
   $url = site_url('/') ;
   $url = urlemma($url);
   ?>
  <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <div class="container-fluid text-center">
          <img src="<?=$url?>/img/LOGOSOLO.png"
           class="img-responsive img-rounded navbar-brand " width="100" height="100" >
           Escuela Biblica A Distancia
    </a>
  </div>
</nav>
