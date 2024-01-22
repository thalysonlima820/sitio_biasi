<?php

namespace App\Database;
use \PDO;

class Connection {

	

	public static function getDb() {
		
		try {

			$conn = new \PDO(
				"mysql:host=viaduct.proxy.rlwy.net;dbname=railway",
				"root",
				"FGf-c31DGd-Bg2c3BbeA1H-5A35CcAeg" 
			);

			return $conn;

		} catch (\PDOException $e) {
			//.. tratar de alguma forma ..//
		}
	}
}

?>