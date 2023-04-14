<?php
class finance extends Controller{

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){  
        if($_SESSION['title'] == "Admin" ){
            $data = [];
            $result = $this->model->getFinance();
            $data['result'] = $result;

            $this->view->render("admin/finance", $data);
        }      
    }

    public function edit(){
        $id =  $_GET['finance_id'];

        $data = [];
        $result = $this->model->getData($id);
        $data['result'] = $result;

        $this->view->render("admin/updateFinance", $data);
    }

    public function update(){
        $id =  $_POST['id'];
        $description =  $_POST['description'];
        $income =  $_POST['income'];
        $expense =  $_POST['expense'];
        
        $update = $this->model->updateRecord($id, $description, $income, $expense);
        echo "<script>alert('Record Updated')</script>";
		echo "<script>window.location.href='index'</script>";
		
    }
    public function delete(){
        $id =  $_GET['finance_id'];
        $result = $this->model->deleteRecord($id);
        echo "<script>alert('Record Removed')</script>";
		echo "<script>window.location.href='index'</script>";

    }
    public function insert(){
        
        $this->view->render("admin/addFinance");

    }

    public function add(){
        $description =  $_POST['description'];
        $income =  $_POST['income'];
        $expense =  $_POST['expense'];

        $this->model->insertRecord($description, $income, $expense);
        echo "<script>alert('New Record Added')</script>";
		echo "<script>window.location.href='index'</script>";

    }
    
    
}