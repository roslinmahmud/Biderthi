<?php
    // Start Seession
    session_start();
    header("Access-Control-Allow-Origin: *");

    //Including functions: excuteQuery, executeNonQuery
    require_once '../controllers/database-connect.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    if($request->reason == 'uploadVideo'){
        $videoURL = $request->videoId;
        $videoTitle = $request->videoTitle;
        $subjectId = $request->subjectId;
        $classId = $request->classId;
        $chapterId = $request->chapterId;
        $userId = $_SESSION['id'];

        $query = "INSERT INTO Videos (VideoURL, VideoTitle, ID, SubjectID, ChapterID, ClassID) VALUES ('$videoURL', '$videoTitle', $userId, '$subjectId', $chapterId, '$classId');";
        if(executeNonQuery($query)){
            echo("Successfully Uploaded the Vidoe");
        }
        else{
            echo("Video Upload failed");
        }
    }
    else if($request->reason == 'getVideos')
    {
        $query = "select * from Videos";
        $result = executeQuery($query);

        $rows = array();
        while($r = $result->fetch_assoc()){
            $rows[] = $r;
        }
        print json_encode($rows);
    }
    else if($request->reason == 'removeVideo'){
        $VideoId = $request->VideoId;
        $query = "DELETE FROM Videos WHERE VideoId='$VideoId';";
        if(executeNonQuery($query)){
            echo("Successfully Removed Video");
        }
        else{
            echo("Remove Video failed");
        }
    }
    else if($request->reason == 'getChapters')
    {
        $subjectId = $request->subjectId;
        $classId = $request->classId;

        $query = "select * from Chapters Where ClassID='".$classId."' and SubjectID='".$subjectId."'";
        $result = executeQuery($query);

        $rows = array();
        while($r = $result->fetch_assoc()){
            $rows[] = $r;
        }
        print json_encode($rows);
    }
    else if($request->reason == 'getClasses')
    {
        $query = "select * from Classes";
        $result = executeQuery($query);

        $rows = array();
        while($r = $result->fetch_assoc()){
            $rows[] = $r;
        }
        print json_encode($rows);
    }
    else if($request->reason == 'getSubjects')
    {
        $query = "select * from Subjects";
        $result = executeQuery($query);

        $rows = array();
        while($r = $result->fetch_assoc()){
            $rows[] = $r;
        }
        print json_encode($rows);
    }
    else if($request->reason == 'AddClass')
    {
        $ClassName = $request->ClassName;
        $query = "INSERT INTO Classes (ClassName) VALUES ('$ClassName');";

        if(executeQuery($query)){
            print "Successfully added the class";
        }
        else{
            print "Class added failed!";
        }
    }
    else if($request->reason == 'AddSubject')
    {
        $SubjectName = $request->SubjectName;
        $query = "INSERT INTO Subjects (SubjectName) VALUES ('$SubjectName');";

        if(executeQuery($query)){
            print "Successfully added the Subject";
        }
        else{
            print "Subject added failed!";
        }
    }
    else if($request->reason == 'AddChapter')
    {
        $ChapterName = $request->ChapterName;
        $ClassID = $request->ClassID;
        $SubjectID = $request->SubjectID;
        $query = "INSERT INTO Chapters (ChapterName, ClassID, SubjectID) VALUES ('$ChapterName', '$ClassID', '$SubjectID');";

        if(executeQuery($query)){
            print "Successfully added the Chapter";
        }
        else{
            print "Chapter added failed!";
        }
    }
    
?>