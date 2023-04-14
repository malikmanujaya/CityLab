<?php

class salary extends Controller{

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $data = [];
        $result = $this->model->getDetails();
        $data['result'] = $result;
        $this->view->render("admin/employeeSalary", $data);
  	
    }

    public function edit(){
        $emp_id =  $_GET['emp_id'];

        $data = [];
        $result = $this->model->getSalary($emp_id);
        $data['result'] = $result;

        $this->view->render("admin/updateSalaryEmp", $data);
    }

    public function update(){
        $emp_id =  $_POST['empId'];
        $new_salary =  $_POST['new_salary'];

        $update = $this->model->updateSalary($emp_id, $new_salary);
        echo "<script>alert('Record Updated')</script>";
		echo "<script>window.location.href='index'</script>";
		
    }


}