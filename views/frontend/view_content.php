<?php
$page_id = (isset($_GET['page'])) ? $_GET['page'] : 1; // se esiste @page in GET usalo se no page_id = 1

require_once ROOT.DS."controllers".DS."controller_content.php";

$ConContentObj = new ConContent();
$auxContent = $ConContentObj->takeContent($param, $page_id);

$content = <<<CONTENT
<section id="content">
	<h1>{$auxContent['page_titleText']}</h1>
	{$auxContent['page_text']}
</section>
CONTENT;
?>