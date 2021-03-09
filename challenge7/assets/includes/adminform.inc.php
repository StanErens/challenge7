<?php
    if(isset($_POST['frm_adminform'])) {
        //verwerk het formulier
        require_once('admin_verwerkform.inc.php');
    } else {
        //toon het formulier
        require_once('form.inc.php');
    }