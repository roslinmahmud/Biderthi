<?php
    // Start Seession
    session_start();
    header("Access-Control-Allow-Origin: *");

    //Including functions: excuteQuery, executeNonQuery
    require_once '../controllers/database-connect.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    if($request->reason == 'uploadVideo'){
        // Upload video
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

        $data = "";
        while($video = $result->fetch_assoc()){
            if($data != ""){$data.=",";}
            $data.='{"VideoId":"'.$video["VideoID"].'",';
            $data.='"VideoTitle":"'.$video["VideoTitle"].'"}';
        }
        echo('['.$data.']');
    }
    else if($request->reason == 'removeVideo'){
        // Remove video
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

        $data = "";
        while($video = $result->fetch_assoc()){
            if($data != ""){$data.=",";}
            $data.='{"ChapterID":"'.$video["ChapterID"].'",';
            $data.='"ChapterName":"'.$video["ChapterName"].'"}';
        }
        echo('['.$data.']');
    }
    else if($request->reason == 'getClasses')
    {
        $query = "select * from Classes";
        $result = executeQuery($query);

        $data = "";
        while($video = $result->fetch_assoc()){
            if($data != ""){$data.=",";}
            $data.='{"ClassID":"'.$video["ClassID"].'",';
            $data.='"ClassName":"'.$video["ClassName"].'"}';
        }
        echo('['.$data.']');
    }
    else if($request->reason == 'getSubjects')
    {
        $query = "select * from Subjects";
        $result = executeQuery($query);

        $data = "";
        while($video = $result->fetch_assoc()){
            if($data != ""){$data.=",";}
            $data.='{"SubjectID":"'.$video["SubjectID"].'",';
            $data.='"SubjectName":"'.$video["SubjectName"].'"}';
        }
        echo('['.$data.']');
    }
    else{
        // Retrieve videos
        $query = "select * from Videos";
        $result = executeQuery($query);

        $data = "";
        while($video = $result->fetch_assoc()){
            if($data != ""){$data.=",";}
            $data.='{"VideoId":"'.$video["VideoURL"].'",';
            $data.='"VideoTitle":"'.$video["VideoTitle"].'"}';
        }
        echo('['.$data.']');
    }
    
?>