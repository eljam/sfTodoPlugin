$(document).ready(function(){
	$('#todo_show').live("click", function () {
		$('#todo_form').slideDown();
		$('#todo_submit').show();
		$('#todo_close').fadeIn();
		$('#todo_show').hide();
	});
	$('#todo_close').live("click", function () {
		$('#todo_form').slideUp();
		$('#todo_submit').hide();
		$('#todo_close').fadeOut();
		$('#todo_show').show();
	});
});
