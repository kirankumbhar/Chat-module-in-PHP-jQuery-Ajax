$(document).ready(function(){
	$("#send").click(function(){
		var text=$('#typedMsg').val();
		var username=$('#uname').val();
		var msgdiv =document.getElementById('#messagesborder');
		//alert(text);
		$.ajax({
			url:"send.php",
			method:"post",
			data:{text,username},
			//dataType: "text",
			success:function(result){
				$("#messages").append(result);
				//$("#messagesborder").animate({ scrollTop: $("#messagesborder")[0].scrollHeight}, 1000);
				$("#messagesborder").scrollTop($("#messagesborder").prop("scrollHeight"));
			}

		});

		$('#typedMsg').val("");


	});
	(function check(){
		$.ajax({
			url: 'checkstatus.php',
			success: function(status){
				//alert(status);
				$('#displaystatus').html(status);
			},
			complete: function() {
			  // Schedule the next request when the current one's complete
			  setTimeout(check, 2000);
			}
		});
	})();



	(function worker() {
		var msgdiv =document.getElementById('#messages');
		  $.ajax({
			url: 'recieve.php',
			success: function(data) {
			  $("#messages").append(data);
			  $("#messagesborder").animate({ scrollTop: $("#messagesborder")[0].scrollHeight}, 1000);

			},
			complete: function() {
			   //Schedule the next request when the current one's complete
			  setTimeout(worker, 2000);
			}
		  });
		})();
});
