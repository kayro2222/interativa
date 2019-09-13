<?php

require_once 'class/index.php';

$index = new Index();



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
				<h4 class="title" style="display: inline">Interativa Digital</h4>
				<a class="float-right" href="login.php" style="text-decoration: none; color: #FFF; font-weight: bold">Login</a>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 vcenter">
					<table style="text-align: center" class="table table-dark table-bordered">
						<thead>
							<tr>
								<th scope="col">Receita</th>
								<th scope="col">Categoria</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($index->select() as $arr){ ?>
								<tr>
									<td><?= $arr['receita'] ?></td>
									<td><?= $arr['categoria'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</body>
</html>