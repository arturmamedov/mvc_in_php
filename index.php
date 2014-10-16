<?php
define('ROOT',dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
$param = 'frontend';
require_once ROOT.DS."views".DS."frontend".DS."view_content.php"; // vista contenuto con dati sui meta key etc.

//require_once ROOT.DS."config".DS."db.php";

require_once ROOT.DS."views".DS."frontend".DS."blocks".DS."head.php";

require_once ROOT.DS."views".DS."frontend".DS."view_menu.php";

echo (isset($content)) ? $content : ''; // mandiamo in output il contenuto se e presente

require_once ROOT.DS."views".DS."frontend".DS."blocks".DS."footer.php";
?>