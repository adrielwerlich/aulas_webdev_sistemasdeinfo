<?php

    if ( (isset($_POST['login']) && $_POST['login'] == 'login') &&  
        (isset($_POST['password']) && $_POST['password'] == 'pass') ) 
    {
        echo 'login done';
        $_POST = array();
        $_POST['controls'] = 'set_controls';
        
        header("Location: ../");
        exit;
    } 
        
        $_POST = array();
        // foreach ($_POST as $key => $value) {
        //     echo '<p>'.$key.'</p>';
        //     echo '<p>'.$value.'</p>';
        // }
        // echo 'some';
    
    header("Location: ../");
    exit;

?>