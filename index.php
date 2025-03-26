<?php

	/***
	 * Modificar el código para que las funciones sean métodos de una clase llamada Producto.
	 * Usar una función php para llamar al método correspondiente de la clase Producto,
	 * dependiendo del método http usado en la solicitud. Ejemplo:
	 * 
	 *     Petición				|		Método a ejecutar
	 * -------------------------------------------------------------
	 * GET localhost/producto/1       	Producto::get(10) 
	 * POST localhost/producto/		  	Producto::post({"id":2, "nombre":"laptop", "precio":10000})
	 *  body: 
	 * 		{"id":2, 
	 * 		 "nombre":"laptop", 
	 * 		 "precio":10000}
	 * 
	 * PUT localhost/producto/		  	Producto::post({"id":2, "nombre":"Computadora de escritorio", "precio":15000})
	 *  body: 
	 * 		{"id":2, 
	 * 		 "nombre":"Computadora de escritorio", 
	 * 		 "precio":15000}
	 * 
	 * DELETE localhost/producto/2    	Producto::delete(2) 
	 */

/* Garcia Ramirez Sergio Ivan - Desarrollo Web  */

	 require_once 'Producto.php';
	echo "Hola mundo<br/>";
	echo $_GET['PATH_INFO'];
	echo "<br/> {$_SERVER['REQUEST_METHOD'] } ";


	$parameters = explode('/',$_GET['PATH_INFO']);

	$recurso = $parameters[0] ?? '';

	$request_method = $_SERVER['REQUEST_METHOD'];

	echo "<hr><br/><br/>"; 
	
    if ($recurso === 'producto') {
		$data = ($request_method === 'POST' || $request_method === 'PUT') ? json_decode(file_get_contents("php://input"), true) : null;
		$param = $data ?? ($parameters[1] ?? null);
		$resultado = call_user_func([$recurso, strtolower($request_method)], $param);
    } else {
        $resultado = "<br/>Recurso no válido<br/>";
    }
    
	echo $resultado . "<br />";


	/*

	//$resultado = call_user_func_array('modificar_variable_global', array(&$mi_variable_global, 2));
	


	$mi_variable_global = 10;
 
	// definimos una función que modificará la variable global
	function modificar_variable_global(&$variable, $otro_parametro) {
		$variable = $variable * $otro_parametro; 

		//global $mi_variable_global;
		$mi_variable_global = 15;

		return "Valor retornado: " . $mi_variable_global;
	}

	// llamamos a la función pasando como referencia la variable global
	//$resultado = modificar_variable_global($mi_variable_global, 2);

	//$resultado = call_user_func('modificar_variable_global', &$mi_variable_global, 2);

	// imprimimos la variable global
	//echo $mi_variable_global; // salida: 20

	*/
?> 