<?php
/**
 *
 * @ Author Name  : DoiZece
 * @ Release on : 2014-12-28
 * @ Author Website  : http://www.buxsense.ro
 *
 **/

define("EvolutionScript", 1);
require_once "includes/global.php";
$query = $db->query("SELECT * FROM settings");

while ($result = $db->fetch_array($query)) {
	$settings[$result['field']] = $result['value'];
}

$gateway = $db->fetchRow("SELECT * FROM gateways WHERE id=6");

if ($input->p['status'] == "ACCEPTED") {
	$amount = $input->pc['amount'];
	$db->query("UPDATE withdraw_history SET status='Completed', date='" . TIMENOW . "' WHERE id=" . $db->real_escape_string($input->pc['udf1']));
	$upd = $db->query("UPDATE gateways SET total_withdraw=total_withdraw+" . $amount . " WHERE id=" . $gateway['id']);
	$db->query("UPDATE members SET pending_withdraw=pending_withdraw-" . $amount . ", withdraw=withdraw+" . $amount . " WHERE id=" . $db->real_escape_string($input->pc['udf2']));
}

?>