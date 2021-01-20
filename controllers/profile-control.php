<?php
    // Import executeNonQuery(), executeQuery() functions
    require_once 'database-connect.php';
    function get_profile_info($username){
        $query = "select * from Users where Username='$username'";
        return executeQuery($query);
    }
    
?>