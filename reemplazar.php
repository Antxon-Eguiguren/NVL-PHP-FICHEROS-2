<?php

	function reemplazar ($rutaFicheroOriginal, $rutaFicheroModificado, $palabra, $sustituta) {

		// Abro el fichero original pasándole la ruta al llamar a la función
		$ficheroOriginal = fopen($rutaFicheroOriginal, "r+");

		while (!feof($ficheroOriginal)) {

			// Leo línea a línea el fichero original
			$lineaOriginal = fgets($ficheroOriginal);

			// Reemplazo la palabra "palabra" por la "sustituta", parámetros pasados en la función
			$lineaModificada = str_replace($palabra, $sustituta, $lineaOriginal);

			// Creo el fichero modificado (en blanco) pasándole la ruta del fichero a crear
			$ficheroModificado = fopen($rutaFicheroModificado, "a") or die ("Error al crear el archivo.");

			// Escribo la línea modificada en el fichero modificado
			fwrite($ficheroModificado, $lineaModificada);
		}

		// Cierro ambos ficheros
		fclose($ficheroOriginal);
		fclose($ficheroModificado);
	}

	reemplazar("quijote.txt", "quijote-modificado.txt", "MANCHA", "LEÓN");

?>