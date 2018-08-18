<?php
require_once __DIR__.'/config/BrowserDetection.php';
$browserdetectionObj = new Wolfcast\BrowserDetection();


$SUPPORTED_BROWSERS = array(
	"Chrome",
	"Mozilla",
	"Firefox",
	"Safari",
	"Opera",
	"Opera Mini",
	"Opera Mobile",
	"Edge",
	"Internet Explorer",
	"Internet Explorer Mobile"
);

if (!in_array($browserdetectionObj->getName(), $SUPPORTED_BROWSERS)) {
	die("Browser not supported.");
}
?>