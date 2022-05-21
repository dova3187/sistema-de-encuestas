<?php
		$searchErr = '';
		$respuestas='';
		if(isset($_POST['save']))
		{
		    if(!empty($_POST['search']))
		    {
		        $search = $_POST['search'];
		        $search_oficina = $_POST['search_oficina'];
		        $search_etapa = $_POST['search_etapa'];
		        $resultado = $mysqli->query("SELECT
		        								resultado_encabezado.id_encuesta,
		        								resultado_encabezado.num_oficina,
		        								resultado_encabezado.id_anios,
		        								resultado_encabezado.id_etapa,
												resultados.id_resultado,
												resultados.id_opcion,
												resultados.respuesta_texto,
												encuestas.titulo,
												encuestas.descripcion,
												preguntas.titulo,
												preguntas.id_tipo_pregunta,
												opciones.valor
											FROM
												resultado_encabezado
											INNER JOIN
												resultados ON resultado_encabezado.id = resultados.id_resultado_encabezado
											INNER JOIN
												encuestas ON resultado_encabezado.id_encuesta = encuestas.id_encuesta
											INNER JOIN
												preguntas ON encuestas.id_encuesta = preguntas.id_encuesta
											LEFT JOIN
												opciones ON resultados.id_opcion = opciones.id_opcion
											WHERE
												resultado_encabezado.id = $search
											AND
												resultado_encabezado.num_oficina = $search_oficina
											AND 
												resultado_encabezado.id_etapa = $search_etapa");
		        $respuestas = $resultado->fetch_all(MYSQLI_ASSOC);
		         
		    }
		    else
		    {
		        $searchErr = "Please enter the information";
		    }
		    
		}