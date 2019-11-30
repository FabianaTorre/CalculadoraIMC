<?php


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
            <a class="nav-link js-scroll-trigger" href="#informacion">Informacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#referencia">Tabla de Referencia</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Calcula tu indice de masa corporal</h1>
      <p class="lead">Utiliza de manera sencilla esta calculadora y obten resultados inmediatos</p>
    </div>
  </header>

  <section id="calcular">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h2>Calcula tu IMC</h2>
          <p class="lead">Ingresa tu peso en kgs y tu altura en mts:</p>
          
          <form class = "" action = "index.php" method = "post">
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

  <section id="informacion" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Informacion</h2>
          <p class="lead">El sobrepeso puede causar la elevación de la concentración de colesterol total y de la presión arterial, y aumentar el riesgo de sufrir la enfermedad arterial coronaria. La obesidad aumenta las probabilidades de que se presenten otros factores de riesgo cardiovascular, en especial, presión arterial alta, colesterol elevado y diabetes.</p>
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
