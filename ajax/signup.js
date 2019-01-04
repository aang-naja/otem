
$("#submit").click( function() {

	 $.post( $("#loginform").attr("action"),
	         $("#loginform :input").serializeArray(),
			 function(info) {

			   $("#info").empty();
			   $("#info").html(info);
				clear();
			 });

	$("#loginform").submit( function() {
	   return false;
	});
});

// function clear() {
//
// 	$("#loginform :input").each( function() {
// 	      $(this).val("");
// 	});
//
// }
