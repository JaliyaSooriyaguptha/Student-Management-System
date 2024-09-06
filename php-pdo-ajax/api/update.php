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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // student values




    $item->sid = $data->sid;
    $item->email = $data->email;
    $item->firstName = $data->firstName;
    $item->lastName = $data->lastName;
    $item->dateOfBirth = $data->dateOfBirth;
    $item->center = $data->center;
    $item->semester = $data->semester;
    $item->cgpa = $data->cgpa;


    $item->created = date('Y-m-d H:i:s');
    
    if($item->updateStudent()){
        echo json_encode("Student data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>