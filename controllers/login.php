<link rel="stylesheet" href="../graphics/styling/style.css" type="text/css" media="screen">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="../scripting/login.js" type="text/javascript" charset="utf-8"></script>


<div class="login">
	<!-- <img src="img/background.jpeg" class="login_image" alt="background"> -->
	<div class="container">
	    <div class="row">
	        <div class="col-md-offset-4 col-md-4">
	            <div class="form-login">
		            <img src="../graphics/images/logo.jpg" alt="Logo">
		           <form id="login-info-form" method="post">
				    <input type="text" name="username" id="userName" class="form-control input-sm chat-input" placeholder="nome de utilizador" />
		            </br>
		            <input type="password" name="userpassword" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
		            </br>
				</form>
		            <div class="wrapper">
			            <span class="group-btn">     
			                <a href="#" class="btn btn-primary btn-md" onclick="requestLogin()">Entrar <i class="fa 								fa-sign-in"></i></a>
			            </span>
		            </div><!-- wrapper -->
				</div><!-- form-login -->
			</div><!-- col-md-offset-4 col-md-4 -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- login -->
