$(document).ready(function(){
		
	$("#sub").click(function(e) {
		e.preventDefault();
		var login = $("#login").val();
		var role = $("#role").val();
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var pwd = $("#pwd").val();

		$.ajax({
			url : "myReg.php",
			type: "POST",
			//async: "false",
			data: {
				"login" : login,
				"role" : role,
				"fname" : fname,
				"lname" : lname,
				"pwd" : pwd
			},
			success: function(result){
				alert(result);
			}
		})
	});

	$("#edit").click(function(e) {
		e.preventDefault();
		var old_log = $("#old_login").val();
		var new_login = $("#new_login").val();
		var role = $("#role").val();
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var pwd = $("#pwd").val();
			
		$.ajax({
			url : "edit_server.php",
			type: "POST",
			//async: "false",
			data: {
				"old_login" : old_log,
				"new_login" : new_login,
				"role" : role,
				"fname" : fname,
				"lname" : lname,
				"pwd" : pwd
			},
			success: function(result){
				alert(result);
			}
		})
	})

	$("#del").click(function(e) {
		e.preventDefault();
		var log = $("#login").val();
			
		$.ajax({
			url : "delete_server.php",
			type: "POST",
			//async: "false",
			data: {
				"login" : log,
			},
			success: function(result){
				alert(result);
			}
		})
	})	

	$("#presslog").click(function(e) {
		e.preventDefault();
		var log = $("#log").val();
		var pwd = $("#pwd").val();
			console.log (log);
			console.log (pwd);
		$.ajax({
			url : "http://localhost:82/server.php",
			type: "POST",
			//async: "false",
			data: {
				'log' : log,
				'pwd' : pwd
			},
			success: function(result){
				alert(result);
				window.location = "admin.php";
			}
		})
	})	
});