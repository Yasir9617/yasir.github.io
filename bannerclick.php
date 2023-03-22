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
	header("location:./?view=home");
}
else {
	$banner_id = $db->real_escape_string($input->g['id']);
	$res = $db->fetchOne(("SELECT COUNT(*) AS NUM FROM banner_ads WHERE id='" . $banner_id . "'"));

	if ($res != 0) {
		$banner_url = $db->fetchOne("SELECT url from banner_ads WHERE id=" . $banner_id);
		$upd = $db->query("UPDATE banner_ads SET clicks=clicks+1 WHERE id=" . $banner_id);
		header("location:" . $banner_url);
		$db->close();
		exit();
	}
	else {
		header("location:./?view=home");
		$db->close();
		exit();
	}
}

$db->close();
exit();
?>