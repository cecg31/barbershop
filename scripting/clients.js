
	$(document).ready(function() {
	    $('#js-date').datepicker();
		
		$("form#clients-form").submit(function(e) {
		    e.preventDefault();    
		    var formData = new FormData(this);
			
		    $.ajax({
		        url: "../controllers/addClient.php",
		        type: 'POST',
		        data: formData,
		        success: function (data) {
		            alert(data)
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });
		});
	});
