<?php
require_once ROOT.DS."controllers".DS."controller_menu.php";
$ConMenuObj = new ConMenu();
$auxMenu = $ConMenuObj->takeMenu($param);	
		
$linkNum = count($auxMenu); // variabile con il numero massimo di link
$liMenu = '';
// ciclo che itera i dati del database e li registra in una variabile
for($i=0;$i!=$linkNum;$i++){	
	$liMenu .= "<li><a href='?page={$auxMenu[$i]['menu_id']}' title='{$auxMenu[$i]['menu_title']}'>{$auxMenu[$i]['menu_name']}</a></li>";
}
?>

<header>
	<nav>
	<h1><a href="http://mvc.ex/" title="HOME" >MVC in PHP</a></h1>
		<ul id="nav">
			<?=$liMenu;?>
		</ul>
	</nav>
</header>