<?php 

class Conexao{
	private $user;
	private $password;
	private $db;
	private $server;
	private static $pdo;

	public function __construct(){
		$this->server = 'localhost';
		$this->db = 'interativa';
		$this->user = 'root';
		$this->senha = '';
	}

	public function connect(){
		try{
			if(is_null(self::$pdo)){
				self::$pdo = new PDO('mysql:host='.$this->server.';dbname='.$this->db, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			}
			return self::$pdo;
		}catch(PDOException $e){
			echo 'Error: '.$e->getMessage();
		}
	}
}

?>