<?php

date_default_timezone_set('Asia/Calcutta');

class Logger {
	
	function __construct() {
		$this->LOG_FILE = __DIR__."/../db/logs.csv";
	}

	function log($browser, $os, $canvas, $useragent, $safe) {

		$file = fopen($this->LOG_FILE, 'a');

		$result = fputcsv($file, array(date('m/d/Y h:i:s a', time()), $browser, $os, $canvas, $useragent, $safe));
		
		fclose($file);

		return $result;
	}

	function getAllLogs() {
		$file = fopen($this->LOG_FILE, 'r');

		$logs = [];
		
		while(!feof($file)) {
			$logs[] = fgetcsv($file);
		}
		
		fclose($file);

		return json_encode($logs);
	}
}

$loggerObj = new Logger();
?>