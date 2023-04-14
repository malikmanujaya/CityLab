<?php
class home extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){ 
        if($_SESSION['title'] == "Patient" ){

            $patientId = "P".$_SESSION['user_id'];
            $data = [];
            $articles = $this->model->getArticle();
            $data['articles'] = $articles;

            $book = $this->model->getBookDetails($patientId);
            $data['book'] = $book;

            $this->view->render("patient/home", $data);
        }  
         
        if($_SESSION['title'] == "Doctor"){
            $data = [];
            $articles = $this->model->getArticle();
            $data['articles'] = $articles;

            $this->view->render("doctor/home", $data);
        }   
        
        if($_SESSION['title'] == "Admin"){
            $user_id =  $_SESSION['user_id'];
            $data = [];      
            $result = $this->model->getToolDetails();
            $data['result'] = $result;

            $this->view->render("admin/home", $data);
        }

        if($_SESSION['title'] == "Receptionist"){           
            
            $this->view->render("receptionist/home");
        } 
        
        if($_SESSION['title'] == "CLS" ){           
            
            $this->view->render("CLS/home");
        } 


    }

}