<?php
$SER_ROOT = "..";
$TITLE = "History - Mozart";
$PAGE_ID = "history";

include $SER_ROOT."/modules/header.php";
include $SER_ROOT."/modules/navbar.php";

require_once $SER_ROOT."/config/Logger.php";
?>

<section class="section">
	<div class="container">
		<h1 class="title">
			History
		</h1>
		<p class="subtitle">
			View attempts to access the fingerprint service from here.
		</p>
		<div class="box">
		<!-- <div class="card-content"> -->
			<table class="table is-hoverable is-fullwidth">
				<thead>
					<tr>
						<th>#</th>
						<th>TD</th>
						<th>OS</th>
						<th>Browser</th>
						<th>Canvas MD5</th>
						<th>Safety Class</th>
						<!-- <th>User Agent</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					$logs = json_decode($loggerObj->getAllLogs(), true);
					$index = 1;
					foreach ($logs as $log) {
						if ($log == array() || is_null($log))
							continue;
					?>
					<tr>
						<td><?=$index++?></td>
						<td><?=$log[0]?></td>
						<td class="get-os-icon"><?=$log[2]?></td>
						<td class="get-browser-icon"><?=$log[1]?></td>
						<td class="convert-to-md5"><?=$log[3]?></td>
						<td class="get-safety-class"><?=$log[5]?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>	
		</div>
	</div>
</section>
<?php
include $SER_ROOT."/modules/footer.php";
?>