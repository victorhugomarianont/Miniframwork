<?php

namespace App\Models;

use MF\Model\Model;

class mensagens extends Model {
	private $Cor;
	private $Detalhes;

		public function __get($atributos) {
			return $this->$atributos;
		}
	
		public function __set($atributos, $valores) {
			$this->$atributos = $valores;
		}
	
		public function salvarCores() {
	
			$query = "insert into mensagens(Cor, Detalhes)values(:Cor, :Detalhes)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':Cor', $this->__get('Cor'));
			$stmt->bindValue(':Detalhes', $this->__get('Detalhes'));
			$stmt->execute();
	
			return $this;
		}
	
		public function getAll() {
			
			$query = "select id, Cor, Detalhes from mensagens where LOWER(Cor) like LOWER(:Cor)";		
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':Cor','%'.$this->__get('Cor').'%');
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function getAllcores() {
			
			$query = "select id, Cor, Detalhes from mensagens where LOWER(Cor) like LOWER(:Cor)";		
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':Cor','%'.$this->__get('Cor').'%');
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
	
		public function deleteCores(){
			
			$query = "delete from mensagens where id = :id";
			$delete = $this->db->prepare($query);
			$delete->bindValue(':id',$this->__get('id'));
			$delete->execute();
			return $delete->fetchAll(\PDO::FETCH_ASSOC);
		}
	
		
		
	}
?>
