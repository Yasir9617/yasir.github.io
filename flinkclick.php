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
	$res = $db->fetchOne("SELECT COUNT(*) AS NUM FROM featured_link WHERE id=" . $ad_id);

	if ($res != 0) {
		$featuredlink = $db->fetchOne("SELECT url from featured_link WHERE id=" . $ad_id);
		$upd = $db->query("UPDATE featured_link SET clicks=clicks+1 WHERE id=" . $ad_id);
		header("location:" . $featuredlink);
		$db->close();
		exit();
	}
	else {
		header("location: index.php");
		$db->close();
		exit();
	}
}

exit();
?>