<?php
    class Student{

        // Connection
        private $conn;

        // Table
        private $db_table = "student";

        // Columns
        public $id;
        public $cgpa;
        public $firstName;
        public $lastName;
        public $dateOfBirth;
        public $center;
        public $semester;
        public $created;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getStudents(){
            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }


        // GET ALL
        public function getStudentsFindByName(){

if ($this->type=="byFirstName") {


            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       firstName LIKE '".$this->id."%"."' ";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}elseif ($this->type=="byLastName") {

            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       lastName LIKE '".$this->id."%"."' ";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}elseif ($this->type=="byEmail") {

            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       email LIKE '".$this->id."%"."' ";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}elseif ($this->type=="byCenter") {

            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       center LIKE '".$this->id."%"."' ";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}elseif ($this->type=="bySemester") {

            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       semester LIKE '".$this->id."%"."' ";
                       
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}elseif ($this->type=="byCgpa") {

            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       cgpa LIKE '".$this->id."%"."' ";
                       
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}else{

            $sqlQuery = "SELECT id,sid, email,firstName, lastName, dateOfBirth, center, semester,cgpa, created FROM " . $this->db_table . "
                    WHERE 
                       firstName LIKE '".$this->id."%"."' ";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
}

        }


        // CREATE
        public function createStudent(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET

                        sid = :sid, 
                        email = :email, 
                        firstName = :firstName, 
                        lastName = :lastName, 
                        dateOfBirth = :dateOfBirth, 
                        center = :center, 
                        semester = :semester, 
                        cgpa = :cgpa, 
                        created = :created";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->sid=htmlspecialchars(strip_tags($this->sid));

            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->firstName=htmlspecialchars(strip_tags($this->firstName));
            $this->lastName=htmlspecialchars(strip_tags($this->lastName));
            $this->dateOfBirth=htmlspecialchars(strip_tags($this->dateOfBirth));
            $this->center=htmlspecialchars(strip_tags($this->center));
            $this->semester=htmlspecialchars(strip_tags($this->semester));
            $this->cgpa=htmlspecialchars(strip_tags($this->cgpa));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":sid", $this->sid);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":firstName", $this->firstName);
            $stmt->bindParam(":lastName", $this->lastName);
            $stmt->bindParam(":dateOfBirth", $this->dateOfBirth);
            $stmt->bindParam(":center", $this->center);
            $stmt->bindParam(":semester", $this->semester);
            $stmt->bindParam(":cgpa", $this->cgpa);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // UPDATE
        public function getSingleStudent(){
            $sqlQuery = "SELECT
                        id, 
                        sid,
                        email, 
                        firstName, 
                        lastName, 
                        dateOfBirth, 
                        center, 
                        semester, 
                        cgpa,
                        created
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->sid = $dataRow['sid'];
            $this->email = $dataRow['email'];
            $this->firstName = $dataRow['firstName'];
            $this->lastName = $dataRow['lastName'];
            $this->dateOfBirth = $dataRow['dateOfBirth'];
            $this->center = $dataRow['center'];
            $this->semester = $dataRow['semester'];
            $this->cgpa = $dataRow['cgpa'];
            $this->created = $dataRow['created'];
        }   

        // UPDATE
        public function getSingleStudentByEmail(){
            $sqlQuery = "SELECT
                        id, 
                        sid, 
                        email, 
                        firstName, 
                        lastName, 
                        dateOfBirth, 
                        center, 
                        semester, 
                        cgpa,
                        created
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       email = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->sid = $dataRow['sid'];
            $this->email = $dataRow['email'];
            $this->firstName = $dataRow['firstName'];
            $this->lastName = $dataRow['lastName'];
            $this->dateOfBirth = $dataRow['dateOfBirth'];
            $this->center = $dataRow['center'];
            $this->semester = $dataRow['semester'];

            $this->cgpa = $dataRow['cgpa'];
            $this->created = $dataRow['created'];
        }   

        // UPDATE
 





        // UPDATE
        public function updateStudent(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        sid = :sid,
                        email = :email,
                        firstName = :firstName, 
                        lastName = :lastName, 
                        dateOfBirth = :dateOfBirth, 
                        center = :center, 
                        semester = :semester, 
                        cgpa = :cgpa, 
                        created = :created
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->sid=htmlspecialchars(strip_tags($this->sid));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->firstName=htmlspecialchars(strip_tags($this->firstName));
            $this->lastName=htmlspecialchars(strip_tags($this->lastName));
            $this->dateOfBirth=htmlspecialchars(strip_tags($this->dateOfBirth));
            $this->center=htmlspecialchars(strip_tags($this->center));
            $this->semester=htmlspecialchars(strip_tags($this->semester));
            $this->cgpa=htmlspecialchars(strip_tags($this->cgpa));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":sid", $this->sid);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":firstName", $this->firstName);
            $stmt->bindParam(":lastName", $this->lastName);
            $stmt->bindParam(":dateOfBirth", $this->dateOfBirth);
            $stmt->bindParam(":center", $this->center);
            $stmt->bindParam(":semester", $this->semester);
            $stmt->bindParam(":cgpa", $this->cgpa);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteStudent(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        // DELETE
        function deleteStudentByEmail(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE email = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        // DELETE
        function deleteStudentBySid(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE sid = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>

