<?php
    include('common/common.php');

    session_start();
    $id = $_SESSION['id'];
    $message = $POST_['message'];


    $query = " 
        SELECT *
        FROM user_messages
        WHERE id = :id
    ";

    $query_params = array(
        ":id" => $id
        ":message" => $message
    );

    try 
    { 
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } 
    catch(PDOException $ex)
    {die("Failed to run query: " . $ex->getMessage());}

    $row = $stmt->fetch(); 
    ?>