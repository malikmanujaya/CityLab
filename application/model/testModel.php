<?php

class testModel extends Model{

    function __construct(){
        parent::__construct();
    }
    
    function getRecords($patientId){
        $query = "SELECT * FROM report 
            INNER JOIN report_test_type ON report.report_id = report_test_type.report_id 
            INNER JOIN test ON test.test_id = report_test_type.test_id 
            WHERE patient_id = '$patientId'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }  
    
    function getTests(){
        $query = "SELECT * FROM test";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } 

    function getTest($test_id){
        $query = "SELECT * FROM test WHERE test_id=$test_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function updateTest($test_id, $name, $description, $ref_range, $cost){
        $query = "UPDATE test SET name = '$name', description= '$description', ref_range= '$ref_range', cost= '$cost' WHERE test_id = '$test_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    function deleteTest($test_id){
        $query = "DELETE FROM test WHERE test_id = '$test_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
    } 
    function insertTest($name, $description, $ref_range, $cost){
        $query = "INSERT INTO test (name, description, ref_range, cost)  VALUES ('$name', '$description', '$ref_range', '$cost');";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    function getPatientRecords($patient_id){
        $query = "SELECT * FROM report INNER JOIN report_test_type ON report.report_id = report_test_type.report_id INNER JOIN test ON test.test_id = report_test_type.test_id WHERE patient_id='$patient_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
