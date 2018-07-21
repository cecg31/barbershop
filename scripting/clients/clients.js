
	$(document).ready(function() {
	   	//selecionar data
	    $('#js-date').datepicker();

		//envia dados por ajax do formulario


		$("form#clients-form").submit(function(e) {
	        e.preventDefault();
	        var formData = new FormData(this);

	        $.ajax({
	            url: "controllers/create_Client.php", 
	            type: 'POST',
	            data: formData,
	            success: function (data) {
					swal( 'Cliente inserido com sucesso!', 'Aguarde', 'success');

		                setTimeout(function(){

		                  window.location.href="main.php#view=view-client";

		                }, 1500);
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

		$('.cancel-btn').on('click', function () {
			window.location.hash = 'view=view-client';
		});
	});
