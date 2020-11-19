<?php
    // Import executeNonQuery(), executeQuery() functions
    require '../models/database-connect.php';

    function register($name, $email, $username, $number, $address, $password){
        $query = "INSERT INTO Users (Name, Email, Username, Password, Number, Address)
        VALUES ('$name', '$email', '$username', '$password', '$number', '$address');";
        return executeNonQuery($query);
    }
?>