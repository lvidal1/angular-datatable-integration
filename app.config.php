 <?php

// Si la constante INIT_CONFIG esta definida, no se definen las demas CONSTANTES
if( !defined( "INIT_CONFIG" ) ){

	define('INIT_CONFIG', 1);

	define('DS'			, DIRECTORY_SEPARATOR);
	define('DOC_ROOT'	, DS);
	define('UTIL_ROOT'	, "utils");
	define('INC_ROOT'	, "inc");
	define('FE_ROOT'	, INC_ROOT.DS."fe");
	define('BE_ROOT'	, INC_ROOT.DS."be");
	
	// Estados
	define("ST_ACTIVE"	,1);
	define("ST_INACTIVE",2);

}

?>