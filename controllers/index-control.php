<?php
    // Import executeNonQuery(), executeQuery() functions
    require_once 'database-connect.php';

    function getBookData(){
        $query = "select * from Books";
        return executeQuery($query);
    }

    function getClasses()
    {
        $query = "select * from Classes";
        return executeQuery($query);
    }

    function getSubjects()
    {
        $query = "select * from Subjects";
        return executeQuery($query);
    }

    function getChapters($classId, $subjectId)
    {
        $query = "select * from Chapters where ClassID='$classId' and SubjectID='$subjectId'";
        return executeQuery($query);
    }

?>