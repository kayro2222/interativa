<?php 

include_once "conexao.php";

class Receita{

	private $con;
	private $id;
	private $id_categoria;
	private $receita;
	
	public function __construct(){
		$this->con = new Conexao();
	}

	public function select(){
		try{
			$query = $this->con->connect()->prepare("SELECT r.id, c.categoria, r.receita FROM receita r JOIN categoria c ON r.id_categoria = c.id WHERE c.ativo = true AND r.ativo = true ORDER BY r.id;");
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function selectCategory(){
		try{
			$query = $this->con->connect()->prepare("SELECT id, categoria FROM categoria WHERE ativo = true;");
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function selectById($id){
		try{
			$this->id = $id;
			$query = $this->con->connect()->prepare("SELECT r.id, r.id_categoria, r.receita FROM receita r JOIN categoria c ON c.id = r.id_categoria WHERE r.id = :id AND r.ativo = true;");
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
			$this->id_categoria = $data['categoria'];
			$this->receita = $data['receita'];
			$query = $this->con->connect()->prepare("UPDATE receita SET id_categoria = :id_categoria, receita = :receita WHERE id = :id;");
			$query->bindParam(":id", $this->id, PDO::PARAM_INT);
			$query->bindParam(":id_categoria", $this->id_categoria, PDO::PARAM_INT);
			$query->bindParam(":receita", $this->receita, PDO::PARAM_STR);
			if($query->execute()){
				return 'ok';
			}else{
				return 'Error ao alterar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}

	public function insert($data){
		try{
			$this->id_categoria = $data['categoria'];
			$this->receita = $data['receita'];
			$query = $this->con->connect()->prepare("INSERT INTO receita (id_categoria, receita) VALUES (:id_categoria, :receita);");
			$query->bindParam(":id_categoria", $this->id_categoria, PDO::PARAM_INT);
			$query->bindParam(":receita", $this->receita, PDO::PARAM_STR);
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
			$query = $this->con->connect()->prepare("UPDATE receita SET ativo = false WHERE id = :id;");
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