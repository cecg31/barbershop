
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
					$.confirm({
					    title: 'Cliente inserido com sucesso!!',
					    content: 'Something went downhill, this may be serious',
						 icon: 'glyphicon glyphicon-ok',
					    type: 'green',
					    typeAnimated: true,
					    buttons: {
					        close: function () {
					        }
					    }
					});
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });
		});
	});
