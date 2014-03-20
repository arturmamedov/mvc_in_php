<span class="clearfix"></span>
<h1>Gestione Menu</h1>
<?php
	// Messaggi di Errore successo per le azioni della gestione
	echo (isset($_GET['message'])) ? $_GET['message'] : null ;
?>

<table id="TableGestione">
<tr>
	<th class="firstTableItem">Nome Menu</th>
	<th>Visibilità</th>
	<th colspan="2">Modifica</th>
</tr>

<?php
	$action = (isset($_GET['action'])) ? $_GET['action'] : null ;
	$id = (isset($_GET['id'])) ? $_GET['id'] : null ;

	require_once ROOT.DS."controllers".DS."controller_menu.php";
	$ConMenuObj = new ConMenu($action, $id);
	$auxMenu = $ConMenuObj->takeMenu($param);	
	
	$linkNum = count($auxMenu); // variabile con il numero massimo di link
	$liMenu = '';
	// ciclo che itera i dati del database e li registra in una variabile
	for($i=0;$i!=$linkNum;$i++){
		$id = $auxMenu[$i]['menu_id'];
		$title = $auxMenu[$i]['menu_title'];
		$name = $auxMenu[$i]['menu_name'];
	
		if($auxMenu[$i]['menu_visible'] == 1){
			$classVisible = 'TableGestioneVisibleYes';
			$textVisible = 'Visibile';
			$linkVisible = '?menu&action=visibleNo';
		} else {
			$classVisible =  'TableGestioneVisibleNo'; 
			$textVisible = 'Non Visibile';
			$linkVisible = '?menu&action=visibleYes';
		}
		
	
		$liMenu .= '
		<tr>
			<td><a href="?menu&action=edit&id='.$id.'" title="'.$title.'"><span class="TableGestioneRightArrow">arr</span>'.$name.'</a></td>
		
			<td class="TableGestioneAlignCenter"><a href="'.$linkVisible.'&id='.$id.'" title="Visibile/Non Visibile"><span class="'.$classVisible.'">arr</span>'.$textVisible.'</a></td>
		
			<td><a href="?menu&action=edit&id='.$id.'" class="TableGestioneEdit" title="Modifica Menu">ModI</a></td>
		
			<td><a href="?menu&action=delete&id='.$id.'" class="TableGestioneDel" title="Elimina Menu" onclick="return confirm(\'Volete davvero eliminare il punto menu?\')">DelI</a></td>
		</tr>';
}
?>
<?=$liMenu;?>
</table>
<a href="?menu&action=create" class="manageLink" title="Crea un nuovo punto menu!">Crea un nuovo punto menu!</a>