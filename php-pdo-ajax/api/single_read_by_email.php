<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/students.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Student($db);

    $item->id = isset($_GET['search']) ? $_GET['search'] : die();
  
    $item->getSingleStudentByEmail();

    if($item->firstName != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "sid" => $item->sid,
            "email" => $item->email,
            "firstName" => $item->firstName,
            "lastName" => $item->lastName,
            "dateOfBirth" => $item->dateOfBirth,
            "center" => $item->center,
            "semester" => $item->semester,
            "cgpa" => $item->cgpa,
            "created" => $item->created
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Student not found.");
    }
?>