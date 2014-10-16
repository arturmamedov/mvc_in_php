<div class="manageWindow">
<h3>Riempi i campi e crea un punto Menu!</h3>
<form method="POST" action="" class="horizantal-form">
        <p class="clearfix">Identificativo: 
        <input type="number" 
        value="<?php echo (isset($_SESSION['userInputs']['page_id'])) ? $_SESSION['userInputs']['page_id'] : ''; ?>" 
        min="1" max="10" name="page_id" class="form-control"></p>
        <span>
        <?php echo (isset($_SESSION['errors']['page_id'])) ? $_SESSION['errors']['page_id'] : '';?>
        </span>

        <p class="clearfix">keywrods: <input type="text" 
        value="<?php echo (isset($_SESSION['userInputs']['keywords'])) ? $_SESSION['userInputs']['keywords'] : ''; ?>"
        name="keywords" class="form-control"></p>
        <span><?php echo (isset($_SESSION['errors']['keywords'])) ? $_SESSION['errors']['keywords'] : '';?></span>

        
        <p class="clearfix">description: <input type="text" 
        value="<?php echo (isset($_SESSION['userInputs']['description'])) ? $_SESSION['userInputs']['description'] : ''; ?>" 
        name="description" class="form-control"></p>
        <span><?php echo (isset($_SESSION['errors']['description'])) ? $_SESSION['errors']['description'] : '';?></span>

        <p class="clearfix">title: <input type="text" 
        value="<?php echo (isset($_SESSION['userInputs']['title'])) ? $_SESSION['userInputs']['title'] : ''; ?>" 
        min="1" max="10" name="title" class="form-control"></p>
        <span><?php echo (isset($_SESSION['errors']['title'])) ? $_SESSION['errors']['title'] : '';?></span>

        <p class="clearfix">titleText: <input type="text" 
        value="<?php echo (isset($_SESSION['userInputs']['titleText'])) ? $_SESSION['userInputs']['titleText'] : ''; ?>" 
        min="1" max="10" name="titleText" class="form-control"></p>
        <span><?php echo (isset($_SESSION['errors']['titleText'])) ? $_SESSION['errors']['titleText'] : '';?></span>

        <div class="form-group">text: <br>  
            <textarea rows="4" class="form-control" name="text"><?php echo (isset($_SESSION['userInputs']['text'])) ? $_SESSION['userInputs']['text'] : ''; ?></textarea>
        </div>
        <span><?php echo (isset($_SESSION['errors']['text'])) ? $_SESSION['errors']['text'] : '';?></span>

        <p class="clearfix"><input type="submit" class="btn btn-warning btn-lg" name="create" value="Crea Pagina!"></p>
</form>
</div>