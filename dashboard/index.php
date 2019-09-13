<?php 

require_once '../class/login.php';

$login = new Login();

session_start();
if(!isset($_SESSION['logged'])){
	header('location: /interativa/');
}

if(isset($_GET['logout']) == 'true'){
	$login->logoutUser();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="crossorigin="anonymous"></script>
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="../stylesheets/style.css">
</head>
<body>
	<header class="filter">
		<div class="container-fluid">
			<div class="container">
				<a href="categoria.php" style="text-decoration: none; color: #FFF; font-weight: bold">Categorias</a>
				<a href="receita.php" style="padding-left: 15px; text-decoration: none; color: #FFF; font-weight: bold">Receitas</a>
				<a class="float-right" href="?logout=true" style="text-decoration: none; color: #FFF; font-weight: bold">Logout</a>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 vcenter">
					<h4 style="text-align: center">Utilize a barra de navegação para gerenciar as categorias e receitas</h4>
				</div>
			</div>
		</div>
	</section>
</body>
</html>