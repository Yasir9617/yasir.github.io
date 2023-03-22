<?php
/**
 *
 * @ Author Name  : DoiZece
 * @ Release on : 2014-12-28
 *
 **/

session_start();
define("EvolutionScript", 1);
define("DISABLE_TEMPLATE", 1);
require_once "./includes/init.php";

if ($input->g['view']) {
	$controller = strtolower(basename($input->g['view'])) . ".php";

	if (!file_exists(SOURCES . $controller)) {
		$controller = "home.php";
	}
}
else {
	$controller = "home.php";
}


if ($input->g['view'] == "register" || $input->g['view'] == "surfer") {
	include SMARTYLOADER;
}

include SOURCES . $controller;
exit();
?>