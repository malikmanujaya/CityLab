<?php

class patientModel extends Model{

    function __construct(){
        parent::__construct();
    }
    
    function getPatient($docotrId){
        $query = "SELECT * FROM user INNER JOIN patient ON user.user_id = patient.user_id INNER JOIN doctor_patient ON doctor_patient.patient_id = patient.patient_id WHERE doctor_id = '$docotrId'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }  
    
    function getPatients(){
        $query = "SELECT * FROM user INNER JOIN patient ON user.user_id = patient.user_id INNER JOIN doctor_patient ON doctor_patient.patient_id = patient.patient_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }  

    function deletePatient($user_id){
        $query = "DELETE FROM user WHERE user_id = '$user_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    function getAppointments(){
        $query = "SELECT * FROM user INNER JOIN patient ON user.user_id = patient.user_id INNER JOIN doctor_patient ON doctor_patient.patient_id = patient.patient_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
