<?php 

require_once 'class/login.php';

$login = new Login();

if(isset($_POST['logButton'])){
	$login->logUser($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interativa Digital</title>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="crossorigin="anonymous"></script>
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="./stylesheets/style.css">

</head>
<body>
	<header class="filter">
		<div class="container-fluid">
			<div class="container">
				<h4 class="title">Interativa Digital</h4>
			</div>
		</div>
	</header>
	<section id="log-section">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-4 col-md-3 col-lg-3 vcenter">
				<div class="filter filter-login">
					<h4 class="title pad">Login</h4>
					<form action="" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" id="user" name="user" placeholder="Usuário">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Senha">
						</div>
						<button style="width: 100%" name="logButton" class="btn btn-primary btn-form" type="submit">Entrar</button>
					</div>
				</form>
				<?php if(isset($_GET["logged"]) == "false"){ ?>
					<div style="margin-top: 20px; padding-top: 20px;" class="alert alert-danger alert-block alert-aling" role="alert">Ops! E-mail ou Senha estão errado</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
</body>
</html>