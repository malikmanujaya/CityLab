<?php
class inventory extends Controller{

    public function __construct(){
        parent::__construct();
    }
    public function index(){  

        if($_SESSION['title'] == "Admin" ){
            $data = [];
            $result = $this->model->getData();
            $data['result'] = $result;
            $this->view->render("admin/inventory", $data);

        }


        if($_SESSION['title'] == "CLS" ){
            if(isset($_POST['submit'])){
                if (isset($_POST['name']) && isset($_POST['count']) && isset($_POST['action']) ) {
                    if ( !empty($_POST['name']) && !empty($_POST['count']) && !empty($_POST['action']) ) {
                        $name = $_POST['name'];
            
                        if ($_POST['action']=="take"){
                            $count = $this->model->getInventoryCount($name);
                            if(!empty($count)){
                                foreach($count as $c){
                                    $count = $c['0'];
                                }
                                $count = $count - $_POST['count'];
                            }
                            
                        }else{
                            $count = $this->model->getInventoryCount($name);
                            if(!empty($count)){
                                foreach($count as $c){
                                    $count = $c['0'];
                                }
                                $count = $count + $_POST['count'];
                            }
                            
                        }
                        $updated_date = date("Y-m-d");
                        $user_id = $_SESSION['user_id'];
                        $emp_id = $this->model->getEmployeeId($user_id);
                        if(!empty($emp_id)){
                            foreach($emp_id as $e){
                                $emp_id  = $e['0'];
                            }
                            
                        }
                         
                        
                        // echo $_POST[]
                    if($count>=0 && ($_POST['count'] > 0) ){
                        $counts= $this->model->inventoryInsert($name, $count,  $updated_date, $emp_id);
                        $id = $this->model->getInventoryId($name);
                        if(!empty($id)){
                            foreach($id as $i){
                                $id  = $i['0'];
                            }
                            
                        }
                         
                        $counts1 = $this->model->inventoryClsInventory($emp_id, $id);
                        echo "<script>alert('records added successfully');</script>";
                        $this->view->render("CLS/addInventory");
                        
                       
                    }elseif($count<0){
                        echo "<script>alert('Taken tools count is more than stock count!!');</script>";
                        $this->view->render("CLS/addInventory");
                    }elseif($_POST['count'] < 0){
                        echo "<script>alert('Inserted negative count!!');</script>";
                        $this->view->render("CLS/addInventory");
                    }
                    
                    } else{
                        echo "<script>alert('empty');</script>";
                        $this->view->render("CLS/addInventory");
                    }
                 }
                  else {
                        
                        echo "<script>alert('failed');</script>";
                        $this->view->render("CLS/addInventory");
                    }
                }else if(isset($_POST['cancel'])){
                    $this->view->render("CLS/addInventory");
                }else{
                    $this->view->render("CLS/addInventory");
                }
        }   
        
    }

    public function inventoryHistory(){
        //if($_SESSION['title'] == "CLS" )
        $this->view->result = $this->model->getinventoryDetails();        
        $this->view->render("CLS/inventoryHistory");

    }
    public function updateInventory(){
        //if($_SESSION['title'] == "CLS" )
        $this->view->result = $this->model->getinventoryDetails();        
        $this->view->render("CLS/inventoryHistory");

    }

    public function edit(){
        $inventory_id =  $_GET['inventory_id'];

        $data = [];
        $result = $this->model->getInventory($inventory_id);
        $data['result'] = $result;

        $this->view->render("admin/updateInventory", $data);
    }

    public function update(){
        $inventory_id =  $_POST['inventory_id'];
        $name =  $_POST['name'];
        $count =  $_POST['count'];
        
        $update = $this->model->updateInventory($inventory_id, $name, $count);
        echo "<script>alert('Record Updated')</script>";
		echo "<script>window.location.href='index'</script>";
		
    }

    public function delete(){
        $inventory_id =  $_GET['inventory_id'];
        $result = $this->model->deleteInventory($inventory_id);
        echo "<script>alert('Record Removed')</script>";
		echo "<script>window.location.href='index'</script>";

    }

    public function insert(){
        
        $this->view->render("admin/addInventory");

    }

    public function add(){
        $name =  $_POST['name'];
        $count =  $_POST['count'];

        $this->model->insertInventory($name, $count);
        echo "<script>alert('New Record Added')</script>";
		echo "<script>window.location.href='index'</script>";

    }
}
