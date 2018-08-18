<?php
$SER_ROOT = "..";
$TITLE = "Fingerprint - Mozart";
$PAGE_ID = "fingerprint";

include $SER_ROOT."/modules/header.php";
include $SER_ROOT."/modules/navbar.php";

require_once $SER_ROOT."/config/BrowserDetection.php";
$browserdetectionObj = new Wolfcast\BrowserDetection();
?>
<script type="text/javascript" src="<?=$SER_ROOT?>/js/fingerprint.js"></script>
<section class="section">
	<div class="container">
		<h1 class="title">
			Fingerprint
		</h1>
		<p class="subtitle">
			Get your device's fingerprints and other details here
		</p>
	</div>
</section>
<section class="section">
	<div class="container">	
		<div class="box">
			You are using <strong class="device-browser"></strong> on <strong class="device-os"></strong>.<br>
			Your canvas fingerprint is <strong class="device-canvas"></strong>.<br>
			Your device has been classified as <strong class="device-safety-class"></strong>.<br>
		</div>
	</div>
</section>
<script type="text/javascript">
	var device_canvas = fingerprint_canvas();
	var device_browser = '<?=$browserdetectionObj->getName()?>';
	var device_os = '<?=$browserdetectionObj->getPlatform()?>';

	$.ajax({
		type: 'POST',
		url: '<?=$SER_ROOT?>/addFingerprint.php',
		data: {
			'canvas': device_canvas,
			'os': device_os,
			'browser': device_browser,
			'ip': 'UNKNOWN',
			'useragent': '<?=$_SERVER['HTTP_USER_AGENT']?>',
			'action': 'add'
		},
		success: function(data) {
			$('.device-browser').html(device_browser);
			$('.device-canvas').html($.md5(device_canvas));
			$('.device-os').html(device_os);

			if (parseInt(data) == 1) {
				$('.device-safety-class').html('Safe');
				$('.device-safety-class').addClass('has-text-success');
			} else {
				$('.device-safety-class').html('Unsafe');
				$('.device-safety-class').addClass('has-text-danger');
			}
		}
	});
</script>
<?php
include $SER_ROOT."/modules/footer.php";
?>