<?php
    // Import executeNonQuery(), executeQuery() functions
    require_once 'database-connect.php';

    function share($bookname, $authorname, $price, $category, $bookimage, $id){
        $query = "INSERT INTO Books (BookName, AuthorName, Price, Category, BookImage, ID)
        VALUES ('$bookname', '$authorname', '$price', '$category', '$bookimage', '$id');";

        return executeNonQuery($query);
    }
?>