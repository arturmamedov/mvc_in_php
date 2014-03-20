<?php
// Classe con le configurazioni e Debug ----- per localhost <-
	class Conf {
		protected $DB_HOST	= 'localhost';
		protected $DB_USER	= 'root';
		protected $DB_PASS	= 'qweqwe';
		protected $DB_NAME	= 'mvc';	
		
		static function debug($item){ // Funzione di debug 
				echo '<pre>';
				print_r($item);
				echo '</pre>';
			}
		
		static function showerror(){ // Mostra errori mysql
			die("Errore".mysql_errno()." : ".mysql_error());
			}
	}
	
	error_reporting(E_ALL);
?>