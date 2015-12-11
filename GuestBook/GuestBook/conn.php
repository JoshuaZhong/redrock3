<?php
	// class conn {
		$dsn = 'mysql:host=localhost;dbname=GuestBook';
    	$user = 'root';
    	$password = 'qsduity';
 //    	private static $_instance;
 //    	// 构造函数
 //    	private function __construct ($dsn, $user, $password) {
 //    		$this->dsn = $dsn;
 //    		$this->user = $user;
 //    		$this->password = $password; 
			try {
				$ops = array(
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				);
				// $this->pdo = new PDOs ($this->dsn,$this->user,$this->password,$ops);
				$pdo = new PDO($dsn,$user,$password,$ops);
			} catch (PDOException $e) {
				echo "Error:".$e->getMessage()."<br /><br />";
				die();
			}
		// }
		// 私有化__clone()函数
		// private function __clone() {

		// }

		// // 检测自身是否被实例化
		// public static function getInstance() {    
		//     if(!(self::$_instance instanceof self)) {    
		//         self::$_instance = new self();    
		//     }    
		//     return self::$_instance;    
		// }

		// function __destruct()
		//     {
		//     	$this->pdo = null;
		//     }
	// }
?>
