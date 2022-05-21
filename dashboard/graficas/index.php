<!doctype html>
<html lang="en">
  <head>
  	<title>Dashboard || admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<script src="https://kit.fontawesome.com/c7ad093c7c.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/application.css">
  </head>
  <body>
	<?php
	$mysqli = include_once "../config/conexion.php";
	$resultado = $mysqli->query("SELECT id_encuesta, id_usuario, titulo, descripcion, fecha_inicio, fecha_final FROM encuestas");
	$encuestas = $resultado->fetch_all(MYSQLI_ASSOC);

	$resultado_inicial = $mysqli->query("SELECT COUNT(id_etapa) as total from resultado_encabezado WHERE id_etapa = 1");
	$inicial = $resultado_inicial->fetch_all(MYSQLI_ASSOC);

	$resultado_complementaria = $mysqli->query("SELECT COUNT(id_etapa) as total from resultado_encabezado WHERE id_etapa = 2");
	$complementaria = $resultado_complementaria->fetch_all(MYSQLI_ASSOC);

	$resultado_total= $mysqli->query("SELECT COUNT(id) as total from resultado_encabezado");
	$total = $resultado_total->fetch_all(MYSQLI_ASSOC);

	?>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		
		  		<img src="../../imagenes/LogPoderJ.png" class="responsive" width="200"></br>

		  	</br><h4>Datos</h4>
	        <ul class="list-unstyled components mb-5">
              <li class="active">
                  <a href="../graficas/">Gráficas</a>
              </li>
              <li>
              <a href="../tablas/">Tablas</a>
              </li>
              <li>
              <a href="../indicadores/">Indicadores</a>
              </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  ©2022 Poder Judicial del Estado de Yucatán. Todos los Derechos Reservados.</p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <h2 class="mb-4">Análisis de datos</h2>
						<div class="row row justify-content-md-center">
               <div class="col-xl-3 col-md-6">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                     	<i class="fa-4x fa-solid fa-users"></i>
                     </div>
                     <div class="col-8 py-3 bg-primary rounded-right">
                        <div class="h2 mt-0"><?php echo $inicial[0]['total']?></div>
                        <div class="text-uppercase">Etapa</div>
                        <div class="text-uppercase">inicial</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                     	<i class="fa-4x fa-solid fa-users"></i>
                     </div>
                     <div class="col-8 py-3 bg-primary rounded-right">
                        <div class="h2 mt-0"><?php echo $complementaria[0]['total']?></div>
                        <div class="text-uppercase">Etapa</div>
                        <div class="text-uppercase">complemantaria</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-6 col-md-12">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                     	<i class="fa-4x fa-solid fa-square-poll-horizontal"></i>
                     </div>
                     <div class="col-8 py-3 bg-primary rounded-right">
                        <div class="h2 mt-0"><?php echo $total[0]['total']?></div>
                        <div class="text-uppercase">Entrevistas</div>
                        <div class="text-uppercase">Registradas</div>
                     </div>
                  </div>
               </div>
            </div>
						<div class="row row justify-content-md-center">
               <div class="col-xl-3 col-md-6">
               		<h4 class="center-txt">Total de entrevistas</h4>
									<canvas id="myChart" width="400" height="400"></canvas>
               </div>
            </div>
      </div>
		</div>
	</body>
</html>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var inicial = <?php echo $inicial[0]['total']?>;
var complementaria = <?php echo $complementaria[0]['total']?>;
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Inicial', 'Complementaria'],
        datasets: [{
            label: '#',
            data: [inicial, complementaria],
            backgroundColor: [
                'rgba(54, 162, 235)',
                'rgba(204, 68, 0)'
            ],
            hoverOffset: 4
        }]
    },
});
</script>

  </body>
</html>