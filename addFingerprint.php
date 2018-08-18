<?php
if (isset($_POST) && isset($_POST['action']) && $_POST['action'] == "add") {

	require_once "config/Fingerprint.php";
	require_once "config/Logger.php";

	$result =  $fingerprintObj->addFingerprint($_POST['canvas'], $_POST['browser'], $_POST['os'], $_POST['ip']) ? 1 : 0;

	$loggerObj->log($_POST['browser'], $_POST['os'], $_POST['canvas'], $_POST['useragent'], $result);

	echo $result;
}
?>