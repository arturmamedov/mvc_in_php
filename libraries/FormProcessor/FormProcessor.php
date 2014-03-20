<?php
class FormProcessor {

	// I metodi che aiutano a processare le form
	
	// questa classe puo essere riutilizzata ovunque creeremo delle form
	
	var $tags = "<a><img><b><strong><em><i><ul><li><ol><p><br>";
	 
	 
	public function cleanHtml($html){
		$tmp = $html;
		
		//$html = strip_tags($html,$tags);
		
		while(true) {
			// tutto quello chenon va bene lo sostituiamo
			//$string = preg_replace ('/<[^>]*>/', ' ', $string); // elimina tutti i tag html e php
			$html = preg_replace('/(<[^>]*)javascript:([^>]*>)/i', ' ', $html); // elimina tag e javascript !!!

			// se html non cambia nel preg_raplace, out da qua
			if ($html == $tmp)
				break;

			$tmp = $html;
		}
		
		// togliamo gli acapi, tabulazioni e nuove linee
		$string = str_replace("\r", '', $string);   
		$string = str_replace("\n", ' ', $string);   
		$string = str_replace("\t", ' ', $string); 

		// togliamo gli spazi multipli
		$string = trim(preg_replace('/ {2,}/', ' ', $string));
		
		exit($html);
	}
	
}
?>