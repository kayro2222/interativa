<?php 
header('Content-Type: text/html; charset=utf-8');
require_once '../class/login.php';
require_once '../class/receita.php';

$receita = new Receita();

$login = new Login();

//CHECK SESSION LOGIN
session_start();
if(!isset($_SESSION['logged'])){
	header('location: /interativa/');
}
if(isset($_GET['logout']) == 'true'){
	$login->logoutUser();
}

//CREATE
if(isset($_POST['create'])){
	echo $_POST;
	if($receita->insert($_POST) == 'ok'){
		header('location: receita.php');
	}else{
		echo '<script type="text/javascript">alert("Falha no cadastro.");</script>';
	}
}

//UPDATE
if(isset($_POST['edit'])){
	if($receita->update($_POST) == 'ok'){
		header('location: ?acao=edit&id='.$_GET['id']);
	}else{
		echo '<script type="text/javascript">alert("Erro em atualizar");</script>';
	}
}

//ACTION EDIT AND DELETE
if(isset($_GET['action'])){
	switch ($_GET['action']) {
		case 'edit':  
			$action = $receita->selectById($_GET['id']);
			break;
		
		case 'delete':
			if($receita->delete($_GET['id']) == 'ok'){
				header('location: receita.php');
			}
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Dashboard</title>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="crossorigin="anonymous"></script>
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="../stylesheets/style.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">


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
	<section id="list" style="margin-top: 50px;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<table style="text-align: center" class="table table-dark table-bordered">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Receita</th>
								<th scope="col">Categoria</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($receita->select() as $arr){ ?>
								<tr>
									<td scope="row"><?= $arr['id'] ?></td>
									<td><?= $arr['receita'] ?></td>
									<td><?= $arr['categoria'] ?></td>
									<td>
										<a href="?action=edit&id=<?=$arr['id']?>" title="Editar"><i class="fa fa-edit"></i></a>
										<a href="?action=delete&id=<?=$arr['id']?>" title="Deletar"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<section id="form-category" style="margin-top: 30px;">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-4 col-md-3 col-lg-3">
				<div class="filter filter-login">
					<h4 class="title pad">Cadastro de Receita</h4>
					<form action="" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" id="receita" name="receita" placeholder="Receita" value="<?= (isset($action['receita'])) ? ($action['receita']) : ('') ?>">
						</div>
						<div class="form-group">
							<label for="categoria" style="color: #FFF; font-weight: bold">Selecione a categoria</label>
							<select class="form-control" name="categoria" id="categoria" placeholder="Selecione a categoria">
								<?php foreach ($receita->selectCategory() as $arr) { ?>
									<option value="<?= $arr['id'] ?>" <?= (isset($_GET['action']) == 'edit' && $action['id_categoria'] == $arr['id']) ? ('selected') : ('') ?> ><?= $arr['categoria'] ?></option>
								<?php } ?>
							</select>
						</div>
						<button name="<?=(isset($_GET['action']) == 'edit') ? ('edit') : ('create') ?>" style="width: 100%" name="logButton" class="btn btn-primary btn-form" type="submit">
							<?= (isset($_GET['action']) == 'edit') ? ('Editar') : ('Cadastrar') ?>
						</button>
						<input type="hidden" name="id" value="<?=(isset($action['id'])) ? ($action['id']) : ('') ?>">
					</div>
				</form>
			</div>
		</div>
	</section>
</body>
</html>