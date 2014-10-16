<span class="clearfix"></span>
<h1>Gestione Pagine</h1>
<?php
	// Messaggi di Errore successo per le azioni della gestione
	echo (isset($_GET['message'])) ? $_GET['message'] : null ;
?>

<table id="TableGestione">
<tr>
	<th class="firstTableItem">Nome Pagina</th>
	<th>Titolo Testo Pagina</th>
	<th>Testo Pagina</th>
	<th>Keywords</th>
	<th>Description</th>
	<th>Visibilità</th>
	<th colspan="2">Gestisci</th>
</tr>

<?php
	//$action = (isset($_GET['action'])) ? $_GET['action'] : null ;
	//$id = (isset($_GET['id'])) ? $_GET['id'] : null ;

	require_once ROOT.DS."controllers".DS."controller_content.php";
	
	$ConContentObj = new ConContent();
	$aux = $ConContentObj->takeContent($param);	
	
	$pageNum = count($aux); // variabile con il numero massimo di link
	$liContent = '';
	// ciclo che itera i dati del database e li registra in una variabile
	for($i=0;$i!=$pageNum;$i++){
		$id = $aux[$i]['page_id'];
		$meta_key = $aux[$i]['page_keywords'];
		$meta_desc = $aux[$i]['page_description'];
		$page_name = $aux[$i]['page_title'];
		$page_title_text = $aux[$i]['page_titleText'];
		$page_text = substr($aux[$i]['page_text'], 0, 47).' ...'; // 47 lunghezza testo per il preview
		
		if($aux[$i]['active'] == 1){
			$classVisible = 'TableGestioneVisibleYes';
			$textVisible = 'Visibile';
			$linkVisible = '?content&action=visibleNo';
		} else {
			$classVisible =  'TableGestioneVisibleNo'; 
			$textVisible = 'Non Visibile';
			$linkVisible = '?content&action=visibleYes';
		}
		
		$liContent .= '
		<tr>
			<td><a href="?content&action=edit&id='.$id.'" title="Modifica pagina: '.$page_name.'"><span class="TableGestioneRightArrow">arr</span>'.$page_name.'</a></td>
		
			<td>'.$page_title_text.'</td>
			
			<td>'.$page_text.'</td>
			
			<td>'.$meta_desc.'</td>
			
			<td>'.$meta_key.'</td>
			
			<td class="TableGestioneAlignCenter"><a href="'.$linkVisible.'&id='.$id.'" title="Visibile/Non Visibile"><span class="'.$classVisible.'">arr</span>'.$textVisible.'</a></td>
		
			<td><a href="?content&action=edit&id='.$id.'" class="TableGestioneEdit" title="Modifica Pagina: '.$page_name.'">ModI</a></td>
		
			<td><a href="?content&action=delete&id='.$id.'" class="TableGestioneDel" title="Elimina Pagina: '.$page_name.'" onclick="return confirm(\'Volete davvero eliminare la pagina?\')">DelI</a></td>
		</tr>';
}
?>
<?=$liContent;?>
</table>
<a href="?content&action=create" class="btn btn-success" title="Crea una nuovo pagina!">Crea una nuovo pagina!</a>