$(document).ready(function() {

	//hide or show holidays boxes
	$('#holidays').on('click', function() {
		$( ".date_holiday" ).toggleClass("holidays_date");
	})

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

	$("form#resources-form").submit(function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);

	    $.ajax({
	        url: "controllers/create_resources.php", 
	        type: 'POST',
	        data: formData,
	        success: function (data) {
				console.log(data);
				swal( 'Recurso inserido com sucesso!', 'Aguarde', 'success');
	              
	                setTimeout(function(){

	                  window.location.href="main.php#view=view_resources";

	                }, 1500);
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	});

	$('.cancel-btn').on('click', function () {
		window.location.hash = 'view=view-resources';
	});
});