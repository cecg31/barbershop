<!DOCTYPE html>
<html lang="pt" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<!-- LINKS -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/6.6.0/sweetalert2.min.css">
			<!-- SCRIPTS -->
		<script src="https://cdn.jsdelivr.net/sweetalert2/6.6.0/sweetalert2.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="scripting/login.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>

<style type="text/css">
    body
		{
    		color: white;
				background-image: url('graphics/images/hair3.jpg');
				background-size: cover;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;

    }
    .column {
      max-width: 350px;
    }
  </style>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <form id="login-info-form" class="ui large form">
      <div class="ui stacked segment" style="border-radius: 5px;background-color: rgba(255,255,255,0.9); padding: 30px 20px;">
				<h2 class="ui image header" style="color: #093d38;">
					<img style="width:100px; margin-bottom: 10px;border-radius: 15px; border-color: 1px solid white;" src="graphics/images/logomini.jpg" class="image">
						<br>
					<div class="content">
							Portal de Administração
					</div>
				</h2>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" id="username" value="" placeholder="Utilizador">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="userpassword" id="userpassword" value="" placeholder="Palavra-passe">
          </div>
        </div>
        <div id="loginbutton" onclick="requestLogin()" class="ui fluid large submit button" style="background-color: #093d38; color:white;">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>

  </div>
</div>

	</body>
</html>
