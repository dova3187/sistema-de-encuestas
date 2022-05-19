<?php
		$searchErr = '';
		$respuestas='';
		if(isset($_POST['save']))
		{
		    if(!empty($_POST['search']))
		    {
		        $search = $_POST['search'];
		        $resultado = $mysqli->query("SELECT
		        								resultado_encabezado.id_encuesta,
		        								resultado_encabezado.num_oficina,
		        								resultado_encabezado.id_anios,
		        								resultado_encabezado.id_etapa,
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