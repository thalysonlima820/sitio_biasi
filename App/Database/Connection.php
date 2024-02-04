<?php

namespace App\Database;
use \PDO;

class Connection {

	

	public static function getDb() {
		
		try {



			$conn = new \PDO(
				"mysql:host=localhost;dbname=pc_biasi_sitio",
				"root",
				"" 
			);


			return $conn;

		} catch (\PDOException $e) {
			//.. tratar de alguma forma ..//
		}
	}
}

?>