<?php
class test extends Controller{

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){   
        if($_SESSION['title'] == "Patient" ){  
            $patientId = "P".$_SESSION['user_id']; 
            $data = [];
            $result = $this->model->getRecords($patientId);
            $data['result'] = $result;
 
            $this->view->render("patient/test", $data);
        }

        if($_SESSION['title'] == "Admin" ){  
            $data = [];
            $result = $this->model->getTests();
            $data['result'] = $result;
 
            $this->view->render("admin/test", $data);
        }
    }

    public function records(){  
        if($_SESSION['title'] == "Doctor" ){
            $patientId = $_GET['patientId'];
            $data = [];
            $result = $this->model->getRecords($patientId);
            $data['result'] = $result;
            
            $this->view->render("doctor/test", $data);
        }

        if($_SESSION['title'] == "Admin" ){
            $patient_id =  $_GET['patientId'];

            $data = [];
            $result = $this->model->getPatientRecords($patient_id);
            $data['result'] = $result;
            $this->view->render("admin/patient-records", $data);
        }
    }

    public function report(){ 
        //$result = $this->model->getReport($patientId);      
        $this->view->render("patient/report");
    }
    
    public function edit(){
        $test_id =  $_GET['test_id'];

        $data = [];
        $result = $this->model->getTest($test_id);
        $data['result'] = $result;

        $this->view->render("admin/updateTest", $data);
    }

    public function update(){
        $test_id =  $_POST['test_id'];
        $name =  $_POST['name'];
        $description =  $_POST['description'];
        $ref_range =  $_POST['ref_range'];
        $cost =  $_POST['cost'];

        $update = $this->model->updateTest($test_id, $name, $description, $ref_range, $cost);
        echo "<script>alert('Record Updated')</script>";
		echo "<script>window.location.href='index'</script>";
		
    }

    public function delete(){
        $test_id =  $_GET['test_id'];
        $result = $this->model->deleteTest($test_id);
        echo "<script>alert('Test Removed')</script>";
		echo "<script>window.location.href='index'</script>";

    }

    public function insert(){
        
        $this->view->render("admin/addTest");

    }

    public function add(){
        $name =  $_POST['name'];
        $description =  $_POST['description'];
        $ref_range =  $_POST['ref_range'];
        $cost =  $_POST['cost'];

        $this->model->insertTest($name, $description, $ref_range, $cost);
        echo "<script>alert('New Test Added')</script>";
		echo "<script>window.location.href='index'</script>";

    }

}