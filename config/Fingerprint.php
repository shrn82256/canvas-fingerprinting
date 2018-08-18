<?php

class Fingerprint {
	
	function __construct() {
		$this->FINGERPRINT_DB = __DIR__."/../db/fingerprint_map.csv";
	}

	function getAllFingerprints() {
		$file = fopen($this->FINGERPRINT_DB, 'r');

		$fingerprints = [];
		
		while(!feof($file)) {
			$fingerprints[] = fgetcsv($file);
		}
		
		fclose($file);

		return json_encode($fingerprints);
	}

	function addFingerprint($canvas, $browser, $os, $ip) {


		$current_fingerprints = json_decode($this->getAllFingerprints(), true);

		foreach ($current_fingerprints as $current_fingerprint) {

			if ($current_fingerprint[0] == $canvas) {
				return ($current_fingerprint[1] == $browser && $current_fingerprint[2] == $os);
			}

			if ($current_fingerprint[1] == $browser
				&& $current_fingerprint[2] == $os) {
				return $current_fingerprint[0] == $canvas;
			}
		}
		
		$file = fopen($this->FINGERPRINT_DB, 'a');

		$result = fputcsv($file, array($canvas, $browser, $os, $ip));
		
		fclose($file);

		return $result;
	}

}

$fingerprintObj = new Fingerprint();

?>