<?php

class doctorModel extends Model{

    function __construct(){
        parent::__construct();
    }
    
    function getData($offset, $no_of_records_per_page){
        $query = "SELECT * FROM user INNER JOIN doctor ON user.user_id = doctor.user_id  INNER JOIN specialization ON specialization.doctor_id = doctor.doctor_id LIMIT $offset, $no_of_records_per_page";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } 
    function getDoctor($patientId){
        $query = "SELECT * FROM user INNER JOIN doctor ON user.user_id = doctor.user_id INNER JOIN doctor_patient ON doctor_patient.doctor_id = doctor.doctor_id INNER JOIN specialization ON specialization.doctor_id = doctor.doctor_id WHERE patient_id = '$patientId'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function getCount(){
        $query = "SELECT * FROM doctor";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $count = $stmt->rowCount();
    }
    function getDoc($doctor_id){
        $query = "SELECT * FROM doctor WHERE doctor_id = '$doctor_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } 

    function updateDoc($doctor_id, $new_salary){
        $query = "UPDATE doctor SET salary = '$new_salary' WHERE doctor_id = '$doctor_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    } 

    function deleteDoc($user_id){
        $query = "DELETE FROM user WHERE user_id = '$user_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}
