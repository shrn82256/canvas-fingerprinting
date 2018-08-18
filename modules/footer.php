<!-- <footer class="footer">
	<div class="content has-text-centered">
		<p>
			<strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
			<a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
		</p>
	</div>
</footer> -->
<script type="text/javascript">
$( document ).ready(function() {
	
	var os_list = [
		{os: 'Windows', tag: 'fab fa-windows has-text-link'},
		{os: 'iOS', tag: 'fab fa-app-store-ios has-text-info'},
		{os: 'Linux', tag: 'fab fa-linux has-text-orange'},
		{os: 'Android', tag: 'fab fa-android has-text-success'},
		{os: 'Macintosh', tag: 'fab fa-apple has-text-dark'}
	];

	var browser_list = [
		{browser: 'Mozilla', tag: 'fab fa-firefox has-text-orange'},
		{browser: 'Firefox', tag: 'fab fa-firefox has-text-orange'},
		{browser: 'Safari', tag: 'fab fa-safari has-text-info'},
		{browser: 'Edge', tag: 'fab fa-edge has-text-link'},
		{browser: 'Internet Explorer', tag: 'fab fa-internet-explorer has-text-link'},
		{browser: 'Internet Explorer Mobile', tag: 'fab fa-internet-explorer has-text-link'},
		{browser: 'Opera', tag: 'fab fa-opera has-text-danger'},
		{browser: 'Opera Mini', tag: 'fab fa-opera has-text-danger'},
		{browser: 'Opera Mobile', tag: 'fab fa-opera has-text-danger'},
		{browser: 'Chrome', tag: 'fab fa-chrome has-text-primary'}
	];

	$('.get-os-icon').each(function() {
		var os = $(this).html();

		for (var i = 0; i < os_list.length; i++) {
			if (os_list[i].os == os) {
				$(this).prepend("<i class='" + os_list[i].tag + "'></i> ");
				break;
			}
		}		
	});
	
	$('.get-browser-icon').each(function() {
		var browser = $(this).html();

		for (var i = 0; i < browser_list.length; i++) {
			if (browser_list[i].browser == browser) {
				$(this).prepend("<i class='" + browser_list[i].tag + "'></i> ");
				break;
			}
		}
	});

	$('.get-safety-class').each(function() {
		var safety_class = parseInt($(this).html());

		if (parseInt(safety_class) == 1) {
			$(this).html('<i class="far fa-smile-beam"></i> Safe Hai');
			$(this).addClass('has-text-success');
		} else {
			$(this).html('<i class="far fa-angry"></i> Unsafe Hai');
			$(this).addClass('has-text-danger');
		}
	});

	$('.convert-to-md5').each(function() {
		$(this).html($.md5($(this).html()));
	});

	$('[data-option-id="<?=$PAGE_ID?>"]').addClass('has-text-weight-bold');

});
</script>
</body>
</html>