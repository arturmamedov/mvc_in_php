<?php
if($_SERVER['HTTP_HOST'] == 'mvc.ex'){
	require_once ROOT.DS."config".DS."conf.php";
} else {
	require_once ROOT.DS."config".DS."sconf.php";
}

	class Db extends Conf {
		
		private $connectionResource; // Variabile che conterra @id della connessione
	
		private function dbConnection() { // Stabilisce connessione al DB
			$this->connectionResource =@ mysql_connect($this->DB_HOST,$this->DB_USER,$this->DB_PASS) or conf::showerror();
			$dbSelect =@ mysql_select_db($this->DB_NAME,$this->connectionResource) or conf::showerror();
			mysql_query("set names utf8") or conf::showerror();
		}
		
		public function query($query) { // Esegue le interrogazioni al DB
			$this->result =@ mysql_query($query) or conf::showerror();
			return $this->result;		
		}
		
		function __construct() {
			$this->dbConnection();
		}
	}
	
$open = new Db();

?>