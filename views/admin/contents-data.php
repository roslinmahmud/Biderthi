<?php
    header("Access-Control-Allow-Origin: *");

    //Including functions: excuteQuery, executeNonQuery
    require_once '../../models/database-connect.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    if($request->reason == 'uploadVideo'){
        // Upload video
        $videoURL = $request->videoId;
        $videoTitle = $request->videoTitle;

        $query = "INSERT INTO Videos (VideoURL, VideoTitle, ID, SubjectID, ChapterID, ClassID) VALUES ('$videoURL', '$videoTitle', 1, 1, 1, 1);";
        if(executeNonQuery($query)){
            echo("Successfully Uploaded the Vidoe");
        }
        else{
            echo("Video Upload failed");
        }
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