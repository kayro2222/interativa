<?php 

include_once "conexao.php";

class Index{

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

	/*public function selectById($id){
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
	}*/
}

?>