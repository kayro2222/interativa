<?php 

include_once "conexao.php";

class Categoria{

	private $con;
	private $id;
	private $categoria;
	
	public function __construct(){
		$this->con = new Conexao();
	}

	public function select(){
		try{
			$query = $this->con->connect()->prepare("SELECT id, categoria FROM categoria WHERE ativo = true ORDER BY id;");
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function selectById($id){
		try{
			$this->id = $id;
			$query = $this->con->connect()->prepare("SELECT id, categoria FROM categoria WHERE id = :id AND ativo = true;");
			$query->bindParam(":id", $this->id, PDO::PARAM_INT);
			if($query->execute()){
				return $query->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function update($data){
		try{
			$this->id = $data['id'];
			$this->categoria = $data['categoria'];
			$query = $this->con->connect()->prepare("UPDATE categoria SET categoria = :categoria WHERE id = :id;");
			$query->bindParam(":id", $this->id, PDO::PARAM_INT);
			$query->bindParam(":categoria", $this->categoria, PDO::PARAM_STR);
			if($query->execute()){
				return 'ok';
			}else{
				return 'Error ao alterar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function insert($categoria){
		try{
			$this->categoria = $categoria;
			$query = $this->con->connect()->prepare("INSERT INTO categoria (categoria) VALUES (:categoria);");
			$query->bindParam(":categoria", $this->categoria, PDO::PARAM_STR);
			if($query->execute()){
				return 'ok';
			}else{
				return 'Error ao cadastrar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function delete($id){
		try{
			$this->id = $id;
			$query = $this->con->connect()->prepare("UPDATE categoria SET ativo = false WHERE id = :id;");
			$query->bindParam(":id", $this->id, PDO::PARAM_INT);
			if($query->execute()){
				return 'ok';
			}else{
				return 'Erro ao deletar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
}

?>