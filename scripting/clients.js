
	$(document).ready(function() {
	   	//selecionar data
	    $('#js-date').datepicker();

		//envia dados por ajax do formulario


		function fieldVerification()
		{
			$("form#clients-form").submit();
		}

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
