<?php

    $server = 'localhost';
    $user = '';
    $password = '';
    $db = '';

    $con = mysqli_connect($server, 'root', '', 'abc_bank');

    if(!$con){
        
        die('Could not connect');
    }

?>
