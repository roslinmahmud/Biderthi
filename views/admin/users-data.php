<?php
    header("Access-Control-Allow-Origin: *");
    
    //Including functions: excuteQuery, executeNonQuery
    require_once '../../models/database-connect.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    if($request->reason == 'updateRole'){
        // Update user role
        $username = $request->username;
        $role = $request->role;
        $query = "UPDATE Users SET Role='$role' WHERE Username='$username';";
        if(executeNonQuery($query)){
            echo("Successfully Updated the Role");
        }
        else{
            echo("Update Role failed");
        }
    }
    else if($request->reason == 'removeUser'){
        // Remove user
        $username = $request->username;
        $query = "DELETE FROM Users WHERE Username='$username';";
        if(executeNonQuery($query)){
            echo("Successfully Remove user");
        }
        else{
            echo("Remove user failed");
        }
    }
    else{
        // Retrieve users
        $query = "select * from Users";
        $result = executeQuery($query);

        $data = "";
        while($user = $result->fetch_assoc()){
            if($data != ""){$data.=",";}
            $data.='{"Name":"'.$user["Name"].'",';
            $data.='"Username":"'.$user["Username"].'",';
            $data.='"Role":"'.$user["Role"].'"}';
        }
        echo('['.$data.']');
    }
    
?>