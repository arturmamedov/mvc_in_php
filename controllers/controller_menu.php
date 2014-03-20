<?php
require_once ROOT.DS."modules".DS."module_menu.php";
require_once ROOT.DS.'libraries'.DS.'FormProcessor'.DS.'FormProcessor_Menu.php';

class ConMenu extends ModMenu {

	function __construct($action = null, $id = null){
		parent::__construct(); // chiamiamo il costruttore padre
		
		if(strlen($action) > 0)
			$this->manageMenu($action, $id);
	}

	function takeMenu($view_param){
		$menu = $this->selectMenu($view_param);		
		return $menu;
	}
	
	function cCreateMenu($_POST){
		if(isset($_POST['submit'])){
			$_SESSION['errors'] = null;
			
			$processor = new FormProcessor_Menu();
			$processor->processor($_POST);
		}
		
		$_POST = null;
		return require_once ROOT.DS.'views'.DS.'backend'.DS.'menu'.DS.'form_createNew_tpl.php';	
	}
	
	function manageMenu($action, $id){
			switch($action){
			case('visibleYes'):
				$visible = 1;
				if(!$this->visibleMenu($id,$visible)){
					echo 'Errore nel cambiare lo stato al menu';
				} else {
					header("Location: admin.php?menu");
				}
			break;
			case('visibleNo'):
				$visible = 0;
				if(!$this->visibleMenu($id,$visible)){
					echo 'Errore nel cambiare lo stato al menu';
				} else {
					header("Location: admin.php?menu");
				}
			break;
			case('edit'):
				$menu_item = $this->selectOneMenu($id);
			
				echo '
					<form method="POST" action="">
						<p>Nome menu: <input type="text" name="menu_name" value="'.$menu_item->menu_name.'"/></p>
						<br>
						<p>Tag title del menu:<input type="text" name="menu_title" value="'.$menu_item->menu_title.'" /></p>
						<br>
						<input type="submit" name="menu_edit" value="Modifica" />
					</form>';
				if($_POST){
					$menu_name = $_POST['menu_name'];
					$menu_title = $_POST['menu_title'];
					
					if(!$this->editMenu($id,$menu_name,$menu_title)) {
						header("Location: admin.php?menu&message=Errore!!! Menu non modificato !"); 
					} else {
						header("Location: admin.php?menu&message=Menu modificato !");
					}
				}				
			break;
			case('delete'):
				if(!$this->deleteMenu($id)){
					header("Location: admin.php?menu&message=Errore!!! Menu non eliminato!");
				} else {
					header("Location: admin.php?menu&message=Menu eliminato!");
				}
			break;
			case('create'):
				$this->cCreateMenu($_POST);
			break;
		}
	}
}
?>