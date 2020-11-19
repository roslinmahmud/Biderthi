<?php
    // Import executeNonQuery(), executeQuery() functions
    require '../models/database-connect.php';

    function login($username, $password){
        $query = "select ID, Name, Role from Users where Username='$username' and Password='$password';";
        return executeQuery($query);
    }

    
?>