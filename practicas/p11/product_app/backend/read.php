<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $buscar = $_POST['id'];
        
        // NUEVA QUERY usando LIKE en nombre, marca o detalles
            $sql = "SELECT * FROM productos 
            WHERE nombre LIKE '%$buscar%' 
               OR marca LIKE '%$buscar%' 
               OR detalles LIKE '%$buscar%'";

        // SE REALIZA LA QUERY DE BÚSQUEDA POR COINCIDENCIA PARCIAL EN NOMBRE, MARCA O DETALLES
        if ( $result = $conexion->query($sql)) {
            // SE OBTIENEN LOS RESULTADOS
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $producto = array();
                foreach($row as $key => $value) {
                    $producto[$key] = utf8_encode($value);
                }
                $data[] = $producto;
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>