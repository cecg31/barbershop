
	$(document).ready(function() {
	   	//selecionar data
	    $('#js-date').datepicker();
		
		//envia dados por ajax do formulario
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
		
		//pre-visualizar foto
	    function readURL(input) {
	           if (input.files && input.files[0]) {
	               var reader = new FileReader();

	               reader.onload = function (e) {
	                   $('#image_upload_preview').attr('src', e.target.result);
	               }

	               reader.readAsDataURL(input.files[0]);
	           }
	       }

	       $("#photo").change(function () {
	           readURL(this);
	       });
	});
