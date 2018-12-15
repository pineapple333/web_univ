$(#"sub").click(function () {
	$.post($("#myForm").attr("action"), $("#myForm : input").serializeArray(), function(info) { $("#result").html(info);} );
	clearInput(); // clears fileds
});
	
	$(#myForm).submit(function () {
		return false;
	});
	
	//clears fields
	function clearInput(){
		$("#myForm: input").each(function(){
			$(this).val('');
		});
	}