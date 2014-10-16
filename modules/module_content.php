<?php
require_once ROOT.DS."libraries".DS."Database_Driver".DS."Mysqlimproved_Driver.php";

class ModContent {
	private $dbTable;
	private $mysqli = null;
	
	function __construct(){
            $this->mysqli = new Mysqlimproved_Driver();

            $this->dbTable = 'mvc_page';
	}
	/* Funzione di estrazione dati in base al page_id
	*/
	function select($view_param, $page_id){ 
		//$page_id = $this->mysqli->escape($page_id); // ripuliamo da simboli speciali
		//$this->mysqli->prepare("SELECT * FROM {$this->dbTable} WHERE page_id='{$page_id}'");
		
		//$this->mysqli->query();// eseguimo la query
		//return $this->mysqli->fetch('assoc'); 
		
		
		switch($view_param){
			case('frontend'):
				$this->mysqli->prepare("SELECT * FROM {$this->dbTable} WHERE page_id='{$page_id}'  AND active = '1'");
				
				$this->mysqli->query(); // eseguimo la query
				return $this->mysqli->fetch('assoc'); // formattiamo la riga in un array associativo
			break;	
			case('backend'):
				$this->mysqli->prepare("SELECT * FROM {$this->dbTable} ORDER BY page_id ASC");
				
				$this->mysqli->query(); // eseguimo la query
				return $this->mysqli->fetch('all_assoc'); // formattiamo tutti i dati in un array associativo
			break;	
		}
	}
	
	function selectOne($id){		
		$id = $this->mysqli->escape($id); // ripuliamo da simboli speciali
		$this->mysqli->prepare("SELECT * FROM {$this->dbTable} WHERE menu_id='{$id}'"); // preparare una query
		$this->mysqli->query(); // eseguimo la query
		
		return $this->mysqli->fetch(); // formattiamo i dati in oggetto
	}
	
	function visible($id,$visible){
		if(!$id) return false;
		if($visible > 1) return false;
		
		$id = $this->mysqli->escape($id); // pulliamo  id
		
		if($visible == 0){
			$this->mysqli->prepare("UPDATE {$this->dbTable} SET active = '0' WHERE page_id = {$id}");
		} else {
			$this->mysqli->prepare("UPDATE {$this->dbTable} SET active = '1' WHERE page_id = {$id}");
		}	

		$this->mysqli->query();		// eseguimo la query
		
		return true;
	}
	
	function edit($id,$data){
		/*if(!$id) return false;
		if(!$menu_name || !$menu_title) return false;
		
		$id = $this->mysqli->escape($id); // pulliamo  id
		
		$this->mysqli->prepare("UPDATE {$this->dbTable} SET menu_name = '{$menu_name}',menu_title = '{$menu_title}' WHERE menu_id = {$id}");
		
		$this->mysqli->query(); // eseguimo la query
		
		return true;*/
	}
	
	function delete($id) {
		$this->mysqli->prepare("DELETE FROM {$this->dbTable} WHERE page_id = {$id}");
		
		$this->mysqli->query(); // eseguimo la query
		
		return true;
	}
	
	/**
	*	metodo per creare un nuovo punto menu
	*
	*	menu_id			int			collegamento alla pagina
	*	menu_name		string		nome del menu
	*	menu_title		string		il titolo del menu, nel tag title=""
	*	menu_visible	'0','1'		se il menu e visibile o no
	*	menu_position	int			la posizione , l'ordine, del menu
	*/
        function create($page_id, $keywords, $description, $title, $titleText, $pageText, $active = 1){
            $this->mysqli->prepare("INSERT INTO {$this->dbTable} 
                (page_id, page_keywords, page_description, page_title, page_titleText, page_text, active) 
                VALUES ('{$page_id}', '{$keywords}', '{$description}', '{$title}', '{$titleText}', '{$pageText}', '{$active}')");

            $this->mysqli->query(); // eseguimo la query

            return true;
	}
}
?>