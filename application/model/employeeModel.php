<?php

class employeeModel extends Model{

    function __construct(){
        parent::__construct();
    }
    
    function getDetails(){
        $query = "SELECT * FROM user INNER JOIN employee ON user.user_id = employee.user_id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } 

    function getEmp($user_id){
        $query = "SELECT * FROM user INNER JOIN employee ON user.user_id = employee.user_id WHERE user.user_id = '$user_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } 

    function updateEmp($empId, $type, $salary){
        $query = "UPDATE employee SET type = '$type', salary= '$salary' WHERE emp_id = '$empId'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    
    function deleteEmp($user_id){
        $query = "DELETE FROM user WHERE user_id = '$user_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}