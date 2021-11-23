<?php
    

    $data = json_decode($_POST['data'],true);

    switch($_REQUEST['action']){
        
        //exampleAjax.
        case "exampleMethod": exampleMethod($data);break;
     
    }


    //Recommended put this method on another file.
    //require realpath('ajax/exampleAjax.php');
    function exampleMethod($data){

        $pass = 'false';
        
        $issetParams = isset($data['name']);

        if($issetParams){
            //Action with 'name' value.
            $pass = 'true';
        }

        echo $pass;

    }
            
