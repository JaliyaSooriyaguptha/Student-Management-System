<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/students.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Student($db);

    $items->id = isset($_GET['search']) ? $_GET['search'] : die();
     $items->type = isset($_GET['type']) ? $_GET['type'] : die();

    $stmt = $items->getStudentsFindByName();
    $itemCount = $stmt->rowCount();


   // echo json_encode($itemCount);

    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "sid" => $sid,
                "email" => $email,
                "firstName" => $firstName,
                "lastName" => $lastName,
                "dateOfBirth" => $dateOfBirth,
                "center" => $center,
                "semester" => $semester,
                "cgpa" => $cgpa,
                "created" => $created
            );

            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>