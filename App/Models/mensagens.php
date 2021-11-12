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
			
			$query = "select id, Cor, Detalhes from mensagens where Cor like :Cor
			group by cor";
					
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':Cor',$this->__get('Cor').'%');
			$stmt->execute();
	
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
	
		
		
	}
?>