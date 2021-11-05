<?php
    



    switch($_REQUEST['action']){
        
        //exampleAjax.
        case "exampleMethod": exampleMethod($_POST['data']);break;
      
    }


    //Recommended put this method on another file.
    //require realpath('ajax/exampleAjax.php');
    function exampleMethod($dataJSON){

        $pass = 'false';

        $data = json_decode($dataJSON,true);
        $issetParams = isset($data['name']);

        if($issetParams){
            //Action with 'name' value.
            $pass = 'true';
        }

        echo $pass;

    }
            
