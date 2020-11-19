<?php
    header("Access-Control-Allow-Origin: *");

    //Including functions: excuteQuery, executeNonQuery
    require_once 'models/database-connect.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

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
    
?>