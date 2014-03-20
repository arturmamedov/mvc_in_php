<?php
// Classe con le configurazioni e Debug ----- per Server WEB <-
	class Conf {
		protected $DB_HOST	= '...';
		protected $DB_USER	= '...';
		protected $DB_PASS	= '...';
		protected $DB_NAME	= '...';	
		
		static function showerror(){ // Mostra errori mysql
			die("Errore".mysql_errno()." : Scusate per il disaggio, si é verificato un errore al DataBase");
		}
	}
	
	error_reporting(0);
?>