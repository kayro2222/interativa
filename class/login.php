<?php

include_once 'conexao.php';

class Login{

	private $con;
	private $user;
	private $password;

	public function __construct(){
		$this->con = new Conexao();
	}

	public function logUser($data){
		$this->user = $data['user'];
		$this->password = sha1($data['password']);

		try{
			$login = $this->con->connect()->prepare("SELECT usuario, senha FROM login WHERE usuario=:user AND senha=:password");
			$login->bindParam(':user', $this->user, PDO::PARAM_STR);
			$login->bindParam(':password', $this->password, PDO::PARAM_STR);
			$login->execute();
			
			if($login->rowCount() == 0){
				header('location: /interativa?logged=false');
			}else{
				session_start();
				$res = $login->fetch();
				$_SESSION['logged'] = 'true';
				$_SESSION['user'] = $res['usuario'];
				header('location: /interativa/dashboard');
			}
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function logoutUser(){
		session_destroy();
		header ('location: /interativa/');
	}
}

?>