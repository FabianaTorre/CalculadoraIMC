<?php

//conexion: server, user, password, database

$mysqli = mysqli_connect("localhost", "root", "", "imc");

//chequear conexion

if (!$mysqli){
  echo "Error al conectar a Maria DB";
  die();
}

//traer datos estadisticos desde bd

$estadisticas = "SELECT AVG(`datos_imc`) AS 'imc', AVG (`datos_peso`) AS 'peso', AVG (`datos_altura`) AS 'altura', COUNT(*) AS 'total' FROM `datos` WHERE 1";
$consulta = $mysqli->query($estadisticas);
$fila = $consulta->fetch_assoc();

$imc_promedio = bcdiv($fila['imc'], '1', 2);
$peso_promedio = bcdiv($fila['peso'], '1', 2);
$altura_promedio = bcdiv($fila['altura'], '1', 2);
$cantidad = bcdiv($fila['total'], '1', 0);

//traer tabla entera desde bd

$consulta = $mysqli->query("SELECT * FROM `datos`");
$tabla = $consulta->fetch_all(MYSQLI_ASSOC);

//preparo variables

$resultado = "";
$color = "";
$imc = "";
$mensaje_imc = "";

if (isset($_POST['peso']) && isset($_POST['altura']) && is_numeric($_POST['peso']) && is_numeric($_POST['altura'])){

    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc = $peso / ($altura * $altura);
    $imc = round($imc, 1);


    if ($imc < 18.5){
        $mensaje_imc = "Tu IMC es: ";
        $resultado = "Tu peso es inferior al normal";
        $color = "red";
    }
    if ($imc >= 18.5 && $imc < 24.9){
        $mensaje_imc = "Tu IMC es: ";
        $resultado = "Tu peso es normal";
        $color = "green";
    }
    if ($imc > 24.9 && $imc < 29.9){
        $mensaje_imc = "Tu IMC es: ";
        $resultado = "Tu peso es superior al normal";
        $color = "orange";
    }
    if ($imc > 30){
        $mensaje_imc = "Tu IMC es: ";
        $resultado = "Obesidad";
        $color = "red";
    }
    $mysqli->query("INSERT INTO `datos`(`datos_altura`, `datos_peso`, `datos_imc`, `datos_mensaje`) VALUES ('".$altura."', '".$peso."', '".$imc."', '".$resultado."');");
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Calculadora IMC</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Calculadora de IMC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#calcular">Calcular!</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#estadisticas">Estadisticas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#referencia">Tabla de Referencia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#registros">Registros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Calcula tu indice de masa corporal</h1>
      <p class="lead">Utiliza de manera sencilla esta calculadora y obten información inmediata</p>
    </div>
  </header>

  <section id="calcular">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Calcula tu IMC</h2>
          <p class="lead">Ingresa tu peso en kgs y tu altura en mts:</p>
          
          <form class = "" action = "index.php#calcular" method = "post">
    Peso (En kg) <br><input type = "number" step = ".01" name = "peso" value = "" placeholder = "Ingresa tu peso en kg" required><br><br>
    Altura (En mt) <br><input type = "number" step = ".01" name = "altura" value = "" placeholder = "Ingresa tu altura en mt" required><br><br>
    <input type = "submit" name = "" value = "Calcular">
    <input type = "reset" name = "" value = "Borrar">
    </form><br>
    <div class="col-lg-6 mx-auto">
    <?php echo $mensaje_imc, $imc; ?><br>
    <div style="color:<?php echo $color; ?>"> <?php echo $resultado;?></div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section id="estadisticas" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Estadisticas</h2>
          <div style="margin-top:20px" class="">
          <b style="color:grey;">IMC Promedio: </b> <?= $imc_promedio; ?><br>
          <b style="color:grey;">Altura Promedio: </b> <?= $altura_promedio; ?><br>
          <b style="color:grey;">Peso Promedio: </b> <?= $peso_promedio; ?><br>
          <b style="color:grey;">Cantidad: </b> <?= $cantidad; ?><br>


        </div>
      </div>
    </div>
  </section>

  <section id="referencia">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Tabla de Referencia</h2>
          <br>
          <table id="TableKey" border="0" width="100%" cellspacing="0" cellpadding="2">
            <tbody>
              <tr>
                <td class="strongtext"><strong>Composición corporal</strong></td>
                <td class="strongtext"><strong>Índice de masa corporal (IMC)</strong></td>
              </tr>
              <tr>
                <td class="AltRow1">Peso inferior al normal</td>
                <td class="AltRow1">Menos de 18.5</td>
              </tr>
              <tr>
                <td class="AltRow2">Normal</td>
                <td class="AltRow2">18.5 – 24.9</td>
              </tr>
              <tr>
                <td class="AltRow1">Peso superior al normal</td>
                <td class="AltRow1">25.0 – 29.9</td>
              </tr>
              <tr>
                <td class="AltRow2">Obesidad</td>
                <td class="AltRow2">Más de 30.0</td>
              </tr>
            </tbody>
          </table>        
        </div>
      </div>
    </div>
  </section>
  <section id="registros" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Registros</h2>
          <div style="margin-top:20px" class="">
            <table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Fecha</th>
        <th scope="col">Altura</th>
        <th scope="col">Peso</th>
        <th scope="col">IMC</th>
        <th scope="col">Mensaje</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tabla as $fila) { ?>
    
      
        <tr>
          <th scope="row"><?php echo $fila['datos_id']; ?></th>
          <td><?php echo $fila['datos_fecha']; ?></td>
          <td><?php echo $fila['datos_altura']; ?></td>
          <td><?php echo $fila['datos_peso']; ?></td>
          <td><?php echo $fila['datos_imc']; ?></td>
          <td><?php echo $fila['datos_mensaje']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>


        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Calculadora de IMC 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
