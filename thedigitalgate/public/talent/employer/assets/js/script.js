//signup
$(".signupcard").click(function() {
	$("#user_type").val($(this).data('id'));
  	$("#signup_form").submit();
});