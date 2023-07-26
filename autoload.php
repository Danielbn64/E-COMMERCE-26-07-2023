<?php

function controllers_autoload($classname)
{
	$env = getenv("ENVIRONMENT");

	if ($env == "PROD") {
		//Cargar controladores en producción
		require_once 'controllers/' . ucfirst($classname) . '.php';
	} else {
		//Cargar controladores en local
		include 'controllers/' . $classname . '.php';
	}
}

spl_autoload_register('controllers_autoload');
