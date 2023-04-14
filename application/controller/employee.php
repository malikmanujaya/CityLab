<?php

class employee extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = [];
        $result = $this->model->getDetails();
        $data['result'] = $result;
        $this->view->render("admin/employeeDetails", $data);
    } 
    
    public function edit(){
        $user_id = $_GET['user_id'];
        $data = [];
        $result = $this->model->getEmp($user_id);
        $data['result'] = $result;

        $this->view->render("admin/updateEmployee", $data);
    } 
    
    public function update(){
        $empId =  $_POST['empId'];
        $type =  $_POST['type'];
        $salary =  $_POST['salary'];

        $update = $this->model->updateEmp($empId, $type, $salary);
        echo "<script>alert('Record Updated')</script>";
		echo "<script>window.location.href='index'</script>";
		
    }

    public function delete(){
        $user_id =  $_GET['user_id'];
        $result = $this->model->deleteEmp($user_id);
        echo "<script>alert('User Removed')</script>";
		echo "<script>window.location.href='index'</script>";

    }

    public function register(){
        
        $this->view->render("admin/registerEmployee");
    }

}