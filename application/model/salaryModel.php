<?php

class salaryModel extends Model{

    function __construct(){
        parent::__construct();
    }
    
    function getDetails(){
        $query = "SELECT * FROM user INNER JOIN employee ON user.user_id = employee.user_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getSalary($emp_id){
        $query = "SELECT * FROM employee WHERE emp_id = '$emp_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function updateSalary($emp_id, $new_salary){
        $query = "UPDATE employee SET salary = '$new_salary' WHERE emp_id = '$emp_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

}