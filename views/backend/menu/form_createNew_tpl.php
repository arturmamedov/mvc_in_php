<div class="manageWindow">
<h3>Riempi i campi e crea un punto Menu!</h3>
	<form method="POST" action="">
		<p class="clearfix">Identificativo del Menu: 
		<input type="number" 
		value="<?php echo (isset($_SESSION['userInputs']['menu_id'])) ? $_SESSION['userInputs']['menu_id'] : ''; ?>" 
		min="1" max="10" name="menu_id"></p>
		<span>
		<?php echo (isset($_SESSION['errors']['menu_id'])) ? $_SESSION['errors']['menu_id'] : '';?>
		</span>
		
		<p class="clearfix">Nome del Menu: <input type="text" 
		value="<?php echo (isset($_SESSION['userInputs']['menu_name'])) ? $_SESSION['userInputs']['menu_name'] : ''; ?>"
		name="menu_name"></p>
		<span><?php echo (isset($_SESSION['errors']['menu_name'])) ? $_SESSION['errors']['menu_name'] : '';?></span>
		
		<p class="clearfix">Titolo del Menu: <input type="text" 
		value="<?php echo (isset($_SESSION['userInputs']['menu_title'])) ? $_SESSION['userInputs']['menu_title'] : ''; ?>" 
		name="menu_title"></p>
		<span><?php echo (isset($_SESSION['errors']['menu_title'])) ? $_SESSION['errors']['menu_title'] : '';?></span>
		
		<select name="menu_visible">
			<option value="1">Visibile</option>
			<option value="0">Non visibile</option>
		</select>
		<span><?php echo (isset($_SESSION['errors']['menu_visible'])) ? $_SESSION['errors']['menu_visible'] : '';?></span>
		
		<p class="clearfix">Posizione del Menu: <input type="number" 
		value="<?php echo (isset($_SESSION['userInputs']['menu_position'])) ? $_SESSION['userInputs']['menu_position'] : ''; ?>" 
		min="1" max="10" name="menu_position"></p>
		<span><?php echo (isset($_SESSION['errors']['menu_position'])) ? $_SESSION['errors']['menu_position'] : '';?></span>
		
		<p class="clearfix"><input type="submit" name="submit" value="Crea il Menu!"></p>
	</form>
</div>