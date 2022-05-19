<?php
		$searchErr = '';
		$respuestas='';
		if(isset($_POST['save']))
		{
		    if(!empty($_POST['search']))
		    {
		        $search = $_POST['search'];
		        $resultado = $mysqli->query("SELECT
												resultados.id_resultado,
												resultados.id_opcion,
												resultados.respuesta_texto
											FROM
												resultado_encabezado
											INNER JOIN
												resultados
											ON
												resultado_encabezado.id = resultados.id_resultado_encabezado
											WHERE
												resultado_encabezado.id = $search");
		        $respuestas = $resultado->fetch_all(MYSQLI_ASSOC);
		         
		    }
		    else
		    {
		        $searchErr = "Please enter the information";
		    }
		    
		}