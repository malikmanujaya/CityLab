<?php
class doctor extends Controller{

    public function __construct(){
        parent::__construct();
    }
    public function index(){   
        if($_SESSION['title'] == "Patient" ){
            $data = [];
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 4;
            $offset = ($pageno-1) * $no_of_records_per_page;
            $total_rows = $this->model->getCount();
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $result = $this->model->getData($offset, $no_of_records_per_page);
            $data['result'] = $result;
            $data['pageno'] = $pageno;
            $data['pages'] = $total_pages;

            $this->view->render("patient/doctor", $data);
        }
        
        if($_SESSION['title'] == "Admin" ){
            $data = [];
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 4;
            $offset = ($pageno-1) * $no_of_records_per_page;
            $total_rows = $this->model->getCount();
            $total_pages = ceil($total_rows / $no_of_records_per_page);
    
            $result = $this->model->getData($offset, $no_of_records_per_page);
            $data['result'] = $result;
            $data['pageno'] = $pageno;
            $data['pages'] = $total_pages;
    
            $this->view->render("admin/doctor", $data);
        } 
    
    }

    public function personalDoctor(){   
        //if($_SESSION['title'] == "Patient" ){ 
        $patientId = "P".$_SESSION['user_id'];
        $data = [];
        $result = $this->model->getDoctor($patientId);
        $data['result'] = $result;

        $this->view->render("patient/personalDoctor", $data);
    }

    public function edit(){
        $doctor_id =  $_GET['doctor_id'];

        $data = [];
        $result = $this->model->getDoc($doctor_id);
        $data['result'] = $result;

        $this->view->render("admin/updateDoctor", $data);
    }
    
    public function update(){
        $doctor_id =  $_POST['docId'];
        $new_salary =  $_POST['new_salary'];

        $update = $this->model->updateDoc($doctor_id, $new_salary);
        echo "<script>alert('Salary Updated')</script>";
		echo "<script>window.location.href='index'</script>";
		
    }

    public function delete(){
        $user_id =  $_GET['user_id'];
        $result = $this->model->deleteDoc($user_id);
        echo "<script>alert('Doctor Removed')</script>";
		echo "<script>window.location.href='index'</script>";

    }

    public function register(){
        
        $this->view->render("admin/registerDoctor");
    }

}
