<?php
require_once 'FormProcessor.php';

class FormProcessor_Content extends FormProcessor {

    public function processor($post){
        $errors = array();

        $page_id = ($post['page_id'] != 0) ? (int)$post['page_id'] : '';
        //if($page_id == 0) $errors['page_id'] = 'Errore "page_id" è vuoto! Per favore selezionare un id valido';

        $keywords = (!empty($post['keywords'])) ? $post['keywords'] : '';
        //if(strlen($menu_name) < 4) $errors['menu_name'] = 'Errore il nome del menu deve essere maggiore di 3 caratteri! Al momento la lunghezza è: '.strlen($post['menu_name']);
        //elseif(strlen($menu_name) > 30) $errors['menu_name'] = 'Errore il nome del menu deve essere minore di 29 caratteri! Al momento la lunghezza è: '.strlen($post['menu_name']);

        $description = (!empty($post['description'])) ? $post['description'] : '';
        //if(strlen($menu_title) < 4 || strlen($post['menu_title']) > 100) $errors['menu_title'] = 'Errore il titolo del menu deve essere maggiore di 3 caratteri e minore di 99 !';

        $title = (!empty($post['title'])) ? $post['title'] : '';
        
        $titleText = (!empty($post['titleText'])) ? $post['titleText'] : '';
        
        $text = (!empty($post['text'])) ? $post['text'] : '';
        
        //$active = ($post['active'] == 1) ? 1 : 0;
        
        if(empty($errors)){
            $_SESSION['userInputs'] = null;

            // la creazione del punto menu
            $module_content = new ModContent;

            if($module_content->create($page_id, $keywords, $description, $title, $titleText, $text)){
                exit('<script type="text/javascript">
                                window.location.href=\'/admin.php?content\';
                        </script>');
            }
        } else { 
            $_SESSION['errors'] = $errors;

            $userInputs = array('page_id' => $page_id, 'keywords' => $keywords, 'description' =>  $description,
                'title' =>  $title, 'titleText' =>  $titleText, 'text' =>  $text);

            $_SESSION['userInputs'] = $userInputs;

            return $_SESSION;
        }
    }
}
?>