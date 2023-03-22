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
$query = $db->query("SELECT * FROM cron_settings");

while ($result = $db->fetch_array($query)) {
	$cron[$result['field']] = $result['value'];
}

$todaysdate = date("Y-m-d");
$the_day = strftime("%Y-%m-%d", strtotime($todaysdate . " + 1 days ago"));

if ($cron['last_cron'] < $the_day) {
	include ROOTPATH . "admin/cronadmin.php";
}

?>