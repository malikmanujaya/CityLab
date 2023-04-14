<?php
class patient extends Controller{

    public function __construct(){
        parent::__construct();
    }
    public function index(){   
        
        if($_SESSION['title'] == "Admin" ){
           
            $data = [];
            $result = $this->model->getPatients();
            $data['result'] = $result;
            $this->view->render("admin/patientDetails", $data);
        }

		if($_SESSION['title'] == "Receptionist" ){
			 $this->view->render("receptionist/addPatient");
		}
    }

    public function myPatients(){   
        //if($_SESSION['title'] == "Patient" ){ 
        $docotrId = "D".$_SESSION['user_id'];
        $data = [];
        $result = $this->model->getPatient($docotrId);
        $data['result'] = $result;
        $this->view->render("doctor/patient", $data);
    }
	
	public function patientHistory(){       
        $this->view->render("receptionist/patientHistory");
    }

    public function delete(){
        $user_id =  $_GET['user_id'];
        $result = $this->model->deletePatient($user_id);
        echo "<script>alert('User Removed')</script>";
		echo "<script>window.location.href='index'</script>";

    }

    public function appointments(){

        $data = [];
        $result = $this->model->getAppointments();
        $data['result'] = $result;
        $this->view->render("admin/appointments", $data);
    }
}
