<?php

class inventoryModel extends Model{
    function __construct(){
        parent::__construct();
    }

    function getData(){

        $query = "SELECT * FROM inventory";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    function getInventory($inventory_id){
        $query = "SELECT * FROM inventory WHERE inventory_id = '$inventory_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function updateInventory($inventory_id, $name, $count){
        $query = "UPDATE inventory SET name = '$name', count= '$count' WHERE inventory_id = '$inventory_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    function deleteInventory($inventory_id){
        $query = "DELETE FROM inventory WHERE inventory_id = '$inventory_id'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    function insertInventory($name, $count){
        $query = "INSERT INTO inventory (name, count)  VALUES ('$name', '$count');";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    function inventoryInsert($name, $count,  $updated_date,$emp_id){
        
        $query = "UPDATE inventory SET updated_date = '$updated_date',count = '$count',emp_id='$emp_id' WHERE name = '$name'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
       
        return $this->db->lastInsertId();

    }
    function getInventoryId($name){
        $query = "SELECT  inventory_id FROM inventory WHERE name = '$name' ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function inventoryClsInventory($emp_id, $id){
        
        $query = "INSERT INTO inventory_cls (inventory_id,emp_id)  VALUES ('$id','$emp_id');";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $this->db->lastInsertId();
    }
    function getInventoryCount($name){
        $query = "SELECT count FROM inventory WHERE name = '$name' ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getEmployeeId($user_id){
        $query = "SELECT emp_id FROM employee WHERE user_id = '$user_id' ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    function getinventoryDetails(){
        $query = "SELECT inventory_id, name, count FROM inventory ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();   
        return $stmt->fetchAll();
    }
}