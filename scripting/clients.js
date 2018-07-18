
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
						content: '',
						icon: 'glyphicon glyphicon-ok',
					    type: 'green',
						theme: 'modern',
						backgroundDismiss: true,
					    typeAnimated: true,
					    buttons: {
					        ok: function () {
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
