<?php
/**
 *
 * @ Author Name  : DoiZece
 * @ Release on : 2014-12-28
 * @ Author Website  : http://www.buxsense.ro
 *
 **/

define("EvolutionScript", 1);
define("ROOTPATH", dirname(__FILE__) . "/");
define("INCLUDES", ROOTPATH . "includes/");
require_once INCLUDES . "global.php";
session_start();

if ($_REQUEST['m'] == "surfer") {
	$module = ROOTPATH . "modules/captcha/getcaptcha2.php";
	include $module;
	exit();
}

exit();
?>