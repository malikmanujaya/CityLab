<?php
class report extends Controller{

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){ 
        if($_SESSION['title'] == "Patient" ){ 
            $this->view->render("patient/report");
        }

        if($_SESSION['title'] == "CLS" ){ 
            $this->view->result = $this->model->getPatientDetails();      
            $this->view->render("CLS/patientCreateReport");
        }
    }
    public function insert(){
        if(isset($_POST['submit'])){
            if (isset($_POST['result']) && isset($_POST['unit']) && isset($_POST['speci_examined'])&& isset($_POST['test'])) {
                if ( !empty($_POST['result']) && !empty($_POST['unit']) && !empty($_POST['speci_examined']) && !empty($_POST['test'])) {
                    $created_date = date("Y-m-d");
                    $result = $_POST['result'];
                    $unit = $_POST['unit'];
                    $speci_examined = $_POST['speci_examined'];
                    $test = $_POST['test'];
                
                    if(isset($_SESSION['doctor_id'])){
                        $doctor_id = $_SESSION['doctor_id'];                      
                        $counts = $this->model->reportInsert($created_date , $result , $unit , $speci_examined , $test, $doctor_id);
                    }else{
                        $counts = $this->model->reportInsert2($created_date , $result , $unit , $speci_examined , $test);  
                    }
                    session_destroy();
                    
                    $message = 'Added Test Type:'.$test;
                    
                    //$sender =  $_SESSION['user_id'];
                    $sender =  '101';
                    $this->view->recei = $this->model->selectAdmin();
                    $rec = $this->view->recei;
                    foreach($rec as $receiv ){
                        $receiver = $receiv['user_id'];
                    }
                    
                    $creat_date =  date("Y-m-d");
                    $created_time = date("h:i:sa");
                    $status = 0;
                    $this->view->id = $this->model->selectId();
                    $ids = $this->view->id;
                    foreach($ids as $id1 ){
                        $reId = $id1['report_id'];
                    }
                    
                    $title = 'Report ID:'.$reId;
                    $counts1 = $this->model->notificationInsert($message, $title,  $created_time, $sender, $receiver,$creat_date, $status);
                    echo "<script>alert('records added successfully');</script>";
                    $this->redirect('viewHistory');
                }else{
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href = '<?php echo BASEURL.'/report/createReport'?>';</script>";
                }
            }else {       
                    echo "<script>alert('failed');</script>";
                    echo "<script>window.location.href = '<?php echo BASEURL.'/report/createReport'?>';</script>";
            }
        }else if(isset($_POST['cancel'])){
                $this->view->render("CLS/createReport");
        }
	}

    public function edit(){
        $this->view->result = $this->model->getOneReportDetails($_GET['report_id']);
        $this->view->render("CLS/editReport");
        if(isset($_POST['update'])) {
            if ( isset($_POST['created_date']) && isset($_POST['result']) && isset($_POST['unit']) && isset($_POST['speci_examined'])&& isset($_POST['test'])) {
                if ( !empty($_POST['created_date']) && !empty($_POST['result']) && !empty($_POST['unit']) && !empty($_POST['speci_examined']) && !empty($_POST['test'])) {
                    $report_id = $_GET['report_id'];   
                    $created_date = $_POST['created_date'];
                    $result = $_POST['result'];
                    $unit = $_POST['unit'];
                    $speci_examined = $_POST['speci_examined'];
                    $test = $_POST['test'];
                    $counts = $this->model->reportUpdate($report_id, $created_date , $result , $unit , $speci_examined , $test);
                    
                    echo "<script>alert('updated successfully');</script>";
                    $this->view->render("CLS/viewHistory");

                }  else{
                    echo "<script>alert('empty');</script>";
                    $this->view->render("CLS/editReport");
                }
               
             }
              else {
                    
                    echo "<script>alert('failed');</script>";
                    $this->view->render("CLS/editReport");
                }
        }
        if(isset($_POST['cancel'])) {
            $this->view->render("CLS/viewHistory");
        }
        
    }

    public function delete(){ 
        
        $this->view->result = $this->model->deleteReportDetails($_GET['report_id']);
        echo "<script>alert('Deleted Successfully');</script>";  
        $this->view->render("CLS/viewHistory");
    }

    public function viewHistory(){
        $this->view->result = $this->model->getreportDetails();       
        $this->view->render("CLS/viewHistory");
        
    }

    public function searchHistory(){
        $this->view->result = $this->model->getOneReportDetails($_POST['search']); 
        $this->view->render("CLS/viewHistory");
    }

    public function createReport(){
        $this->view->render("CLS/createReport");
        
    }
    public function recommendDoctor(){
        $this->view->result = $this->model->getDoctorDetails();      
        $this->view->render("CLS/recommendDoctor");
    }
    public function addRecommendation(){
        echo "<script>alert('Added Recommendation Successfully');</script>";
        $this->view->render("CLS/createReport");
    }

    public function search(){
        $this->view->result = $this->model->getOnePatientDetails($_POST['search']);
        
        $this->view->render("CLS/patientCreateReport");
    }

    public function searchDoctor(){
        $this->view->result = $this->model-> getOneDoctorDetails($_POST['search']);
        
        $this->view->render("CLS/recommendDoctor");
    }

    
}

    

