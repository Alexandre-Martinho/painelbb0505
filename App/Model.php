<?php
$config = ["host"=>"localhost","dbname"=>"contaazul", "dbuser"=>"root","dbpass"=>""];

class model {
	
	 public function __construct() {

		global $config;
		
			try 
			{

				$this->db = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['dbuser'], $config['dbpass']);

				// $this->db = new PDO($this->dsn,$this->user,$this->pwd);
	
			} catch(PDOException $e){
				echo 'Failed connection with error: '.$e->getMessage();	
			}
	
	}
						public function getEmail(){
					
							// $sql = "SELECT * from users ";
							$sql = "SELECT email from users ";
							$statement = $this->db->prepare($sql);
							$statement->execute();
							$result = $statement->fetch();
							// $result = $statement->fetchAll();

							print_r($result);
					
					}
}

$r = new model();

?>