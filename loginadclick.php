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

if (!is_numeric($input->g['id'])) {
	header("location: index.php");
	$db->close();
	exit();
}
else {
	$ad_id = $db->real_escape_string($input->g['id']);
	$res = $db->fetchOne("SELECT COUNT(*) AS NUM FROM login_ads WHERE id=" . $ad_id);

	if ($res != 0) {
		$banner = $db->fetchOne("SELECT url from login_ads WHERE id=" . $ad_id);
		$upd = $db->query("UPDATE login_ads SET clicks=clicks+1 WHERE id=" . $ad_id);
		header("location:" . $banner);
		$db->close();
		exit();
	}
	else {
		header("location:index.php");
		$db->close();
		exit();
	}
}

exit();
?>