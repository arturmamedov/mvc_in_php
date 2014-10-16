<?php
require_once 'FormProcessor.php';

class FormProcessor_Menu extends FormProcessor {

	public function processor($post){
		$errors = array();
		
		$menu_id = ($post['menu_id'] != 0) ? (int)$post['menu_id'] : '';
		if($menu_id == 0) $errors['menu_id'] = 'Errore "menu_id" è vuoto! Per favore selezionare un id valido';
		
		$menu_name = (!empty($post['menu_name'])) ? $post['menu_name'] : '';
		if(strlen($menu_name) < 4) $errors['menu_name'] = 'Errore il nome del menu deve essere maggiore di 3 caratteri! Al momento la lunghezza è: '.strlen($post['menu_name']);
		elseif(strlen($menu_name) > 30) $errors['menu_name'] = 'Errore il nome del menu deve essere minore di 29 caratteri! Al momento la lunghezza è: '.strlen($post['menu_name']);
		
		$menu_title = (!empty($post['menu_title'])) ? $post['menu_title'] : '';
		if(strlen($menu_title) < 4 || strlen($post['menu_title']) > 100) $errors['menu_title'] = 'Errore il titolo del menu deve essere maggiore di 3 caratteri e minore di 99 !';
		
		$menu_visible = ($post['menu_visible'] == 1) ? 1 : 0;
		
		$menu_position = (!empty($post['menu_position'])) ? $post['menu_position'] : '';
		if(empty($menu_position)) $errors['menu_position'] = 'Attenzione! La posizione del punto menu non è stata impostata!';
		
		if(empty($errors)){
			$_SESSION['userInputs'] = null;
			
			// la creazione del punto menu
			$auxModMenu = new ModMenu;
			
			if($auxModMenu->createMenu($menu_id, $menu_name, $menu_title, $menu_visible, $menu_position))
				exit('<script type="text/javascript">
						window.location.href=\'/admin.php?menu\';
					</script>');
		} else { 
			$_SESSION['errors'] = $errors;
			
			$userInputs = array('menu_id' => $menu_id,'menu_name' => $menu_name,'menu_title' =>  $menu_title,'menu_visible' =>  $menu_visible,'menu_position' =>  $menu_position);
			
			$_SESSION['userInputs'] = $userInputs;
			
			return $_SESSION;
		}
	}
}
?>