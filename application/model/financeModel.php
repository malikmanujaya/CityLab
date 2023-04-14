<?php

class financeModel extends Model{

    function __construct(){
        parent::__construct();
    }

    function getFinance(){
        $query = "SELECT * FROM finance";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getData($id){
        $query = "SELECT * FROM finance WHERE id = '$id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function updateRecord($id, $description, $income, $expense){
        $query = "UPDATE finance SET description = '$description', income= '$income', expense= '$expense' WHERE id = '$id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    function deleteRecord($id){
        $query = "DELETE FROM finance WHERE id = '$id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    function insertRecord($description, $income, $expense){
        $query = "INSERT INTO finance (description, income, expense)  VALUES ('$description', '$income', '$expense');";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

}
