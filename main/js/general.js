$(document).ready(function(){
	$('#content').load('content/overwiev.php');

	$('div#nav a').click(function(){
		var page = $(this).attr('href');
		$('#content').load('content/' + page + '.php');
		return false;
	});
});