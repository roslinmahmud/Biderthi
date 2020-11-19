<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "boipoka";

    $connection = new mysqli($host, $username, $password, $dbname);
    
    function executeQuery($query){
        global $connection;
        
        if ($connection -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        }
        
        $result = $connection->query($query);
        return $result;
    }

    function executeNonQuery($query){
        global $connection;
        $result = $connection->query($query);
        return $result;
    }

?>