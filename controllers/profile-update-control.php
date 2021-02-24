<?php
    // Import executeNonQuery(), executeQuery() functions
    require_once 'database-connect.php';

    function update($id, $name, $email, $username, $number, $address, $password)
    {
        
        $query="UPDATE Users SET Name='$name', Email='$email', Username='$username', Number='$number', Address='$address', Password='$password' 
        where id=$id";
        return executeNonQuery($query);
    }

?>