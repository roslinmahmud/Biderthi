<?php
    header("Access-Control-Allow-Origin: *");

    //Including functions: excuteQuery, executeNonQuery
    require_once 'controllers/database-connect.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $classId = $request->classId;
    $subjectId = $request->subjectId;
    $chapterId = $request->chapterId;

    // Retrieve videos
    $query = "select * from Videos where SubjectID='$subjectId' and ClassID='$classId' and ChapterID='$chapterId'";
    $result = executeQuery($query);

    $data = "";
    while($video = $result->fetch_assoc()){
        if($data != ""){$data.=",";}
        $data.='{"VideoId":"'.$video["VideoURL"].'",';
        $data.='"VideoTitle":"'.$video["VideoTitle"].'"}';
    }
    echo('['.$data.']');
    
?>