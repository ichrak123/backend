<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login</title>

	<style>
		
		html,body{
background-image: url('https://scontent.ftun4-1.fna.fbcdn.net/v/t1.15752-9/251925448_407423954298145_2956775869838145595_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=ae9488&_nc_ohc=QUZDfYAajywAX9y2qbK&_nc_ht=scontent.ftun4-1.fna&oh=bc8bccdc11cf7044abdad0cb0995fc24&oe=61A55F38');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}
h1 {
	color: white;
}

	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Bienvenue</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Se connecter
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form method="POST" action="<?php echo base_url(); ?>index.php/user/login">
		            	<fieldset>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Email" type="email" name="email" required>
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Mot de passe" type="password" name="password" required>
		                	</div>
		                	<button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
		            	</fieldset>
		        	</form>
		    	</div>
		    </div>
			<?php
    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<div class="alert alert-info">' . $message . '</div>';
         $this->session->unset_userdata('error');
    }

    ?>

			
		</div>
	</div>
</div>
</body>
</html>